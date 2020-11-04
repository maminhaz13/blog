<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Image;
use App\Home;
use App\User;
use App\About;
use App\Banner;
use App\Contact;
use App\Product;
use App\Category;
use Carbon\Carbon;
use App\Subscriber;
use App\Testmonial;
use App\Contact_info;
use App\Order_details;
use App\Mail\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Storage;


class FrontendController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('checkrole');
    // }

    function user_registration(){
        return view('admin.frontend.user_register');
    }

    function user_registration_post(Request $request){

        // product input validation
        $request->validate([
            'name' => 'required',
            'email' => 'required', 'email', 'unique:users,email',
            'phone_number' => 'unique:users,phone_number', 'nullable',
            'birthday'=> 'date', 'nullable',
            'password'=> 'required',
        ],

        $messages = [
            'name.required' => 'You must insert your name.',
            'email.required' => 'You must insert your email address.',
            'email.email' => 'Your email address should be valid.',
            'email.unique' => 'Your email address is used already. Try another one..',
            'phone_number.unique' => 'Your phone number is used already. Try another one..',
            'birthday.date' => 'Your birth date should be valid date..',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('index');
        }

    }

    function user_login(){
        return view('admin.frontend.customer_login');
    }

    function index(){
        $featured_product = Product::where('show_featured', 2)->get();
        $bestseller_asc = DB::table('Order_details')
            ->select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->get();
        $bestseller_desc = $bestseller_asc->sortByDesc('total')->take(8);
        return view('admin.frontend.landing', [
            'active_categories' => Category::all(),
            'active_products' => Product::all(),
            'banners' => Banner::where('show_status', 1)->get(),
            'testmonials' => Testmonial::where('show_status', 2)->latest()->get(),
            'bestseller_desc' => $bestseller_desc,
            'featured_products' => $featured_product,
        ]);
    }

    /**
     * Display about page for customers.
     */
    public function aboutus()
    {
        $bestseller_asc = DB::table('Order_details')
            ->select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->get();
        $bestseller_desc = $bestseller_asc->sortByDesc('total')->take(8);
        return view('admin.frontend.about', [
            'bestseller_desc' => $bestseller_desc,
            'our_stories' => About::where('show_story', 2)->whereNotNull('story')->get(),
        ]);
    }

    function contact(){ 
        return view('admin.frontend.contact');
    }

    function contactpost(Request $request){ 
        $contact_id = Contact::insertGetId($request->except('_token')+[
            'created_at' => Carbon::now()
        ]);

        // return back();
        if($request->hasFile('contact_attachment')){
            // $file_path = $request->file('contact_attachment')->store('contact_attachment');
            $path = $request->file('contact_attachment')->storeAs(
                'contact_upload', $contact_id . '.' . $request->file('contact_attachment')->getClientOriginalExtension(),
            );
        Contact::find($contact_id)->update([
            'contact_attachment' => $path,
            'updated_at' => Carbon::now(),
            ]);
        }
        return back();
    }

    function contactlist(){
        return view('admin.frontend.contactlist', [
            'contact_details' => Contact::latest()->simplePaginate(7),
        ]);
    }

    function contactlistdownload($contact_id){
        return Storage::download(Contact::findOrFail($contact_id)->contact_attachment);
        return back();
    }

    function send_newsletter(){
        foreach (User::all()->pluck('email') as $email) {
            Mail::to($email)->queue(new NewsLetter());
        }

        foreach (Subscriber::all()->pluck('subscriber') as $email) {
            Mail::to($email)->queue(new NewsLetter());
        }

        return back()->with('newsletter_sent', 'You have sent newsletter to all your subscribers');
    }

    function usertestmonial(Request $request){
        Testmonial::insert([
            'user_id' => Auth::id(),
            'reviewer_name' => Auth::user()->name,
            'reviewer_email' => Auth::user()->email,
            'review_full' => $request->review_full,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    function testmoniallist(){
        return view('admin.frontend.testimonial_list', [
            'testmonial_all' => Testmonial::all(),
        ]);
    }

    function testmonial_show($testimonial_id){
        Testmonial::findOrFail($testimonial_id)->update([
            'show_status' => 2,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('testi_shown', 'You shown a user testimonial');
    }

    function testmonial_hide($testimonial_id){
        Testmonial::findOrFail($testimonial_id)->update([
            'show_status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('testi_hidden', 'You hidden a user testimonial');
    }

    function productdetailsslug(Request $request, $slug){

        $product_info = Product::where('slug', $slug)->firstOrFail();

        $related_products = Product::where('category_id', $product_info->category_id)->where('id', '!=', $product_info->id)->limit(4)->get();

        $review_form_flag = 0;

        if (Order_details::where('user_id', Auth::id())->where('product_id', $product_info->id)->whereNull('review')->exists()){
            $review_form_flag = 1;
            $order_detail_id = Order_details::where('user_id', Auth::id())->where('product_id', $product_info->id)->whereNull('review')->first()->id;
            // $order_details_id = Order_detail::where('user_id', Auth::id())->where('product_id', $product_info->id)->whereNull('review')->first()->id;
        }

        else{
            $review_form_flag = 2;
            $order_detail_id = 0;
        }

        $review = Order_details::where('product_id', $product_info->id)->whereNotNull('review')->get();

        return view('admin.frontend.single_product', [
            'single_product_info' => $product_info,
            'related_products' => $related_products,
            'review_form_flag' => $review_form_flag,
            'order_details_id' => $order_detail_id,
            'review_details' => $review,
        ]);
    }

    function shop(Request $request){

        return view('admin.frontend.shop', [
            'categories' => Category::all(),
            'products' => Product::all(),
        ]);
    }

    function product_review(Request $request){
        Order_details::find($request->order_details_id)->update([
            'stars' => $request->stars,
            'review' => $request->review,
            'updated_at' => Carbon::now(),
        ]);
        return back();
    }

    function subscriber(Request $request){
        $request->validate([
        'subscriber' => 'email:rfc,dns',
        ]);

        Subscriber::insert([
            'user_id' => Auth::id(),
            'subscriber' => $request->subscriber,
            'created_at' => Carbon::Now()
        ]);
        return redirect('/')->with('subscriber_added', 'From now you will get newsletter daily..');
    }

    function search(){
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters('product_name', 'category_id')
            ->allowedSorts('product_name')
            ->get();
        return view('admin.frontend.search', [
            'products' => $products,
            // 'category' => Category::all(),
        ]);
    }

    /**
     * Display all contact details of company.
     */
    function custom_contact(){
        return view('admin.about.contact_infos', [
            'contact_info' => Contact_info::all(),
            'contact_trash' => Contact_info::onlyTrashed()->get(),
        ]);
    }

    /**
     * Add contact details here.
     * 
     */
    function custom_contact_add(Request $request)
    {
        // Validating contact information Start
        $validatedData = $request->validate([
            'email' => [ 'required', 'unique:contact_infos,email', ],
            'telephone' => ['required', 'unique:contact_infos,telephone', 'alpha_num'],
            'phone' => ['required', 'unique:contact_infos,phone',],
            'address' => ['unique:contact_infos,address', 'string', 'nullable'],
        ]);
        // Validating contact information End
        Contact_info::insert([
            'email' => $request->email,
            'telephone' => $request->telephone,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('contact_added', 'You added a contact information successfully');
    }

    /**
     * show edit page for contact details.
     *
     */
    function custom_contact_edit(Request $request, $id){
        return view('admin.about.contact_infos_edit', [
            'contact_info' => Contact_info::findOrFail($id),
        ]);
    }

    /**
     * update edited contact details.
     *
     */
    function custom_contact_update(Request $request, $id){
        Contact_info::findOrFail($id)->update([
            'email' => $request->email,
            'telephone' => $request->telephone,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ]);

        return redirect('customize/contact_info')->with('contact_edit_done', 'Your succesfully edited your existing contact information.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    function custom_contact_trash($id){
        Contact_info::find($id)->delete();
        return redirect('customize/contact_info')->with('contact_trash_done', 'Your trashed a contact information. You can manage it in contact trash table..');
    }

    /**
     * Recover the deleted contact information.
     *
     */
    function custom_contact_restore($id){
        Contact_info::withTrashed()->findOrFail($id)->restore();
        return redirect('customize/contact_info')->with('contact_infos_recover_done', 'Your successfully recovered a piece of information from trash..');
    }

    /**
     * delete parmanetly a piece of information here.
     *
     */
    public function custom_contact_delete($id)
    {
        Contact_info::withTrashed()->findOrFail($id)->forceDelete();
        return redirect('customize/contact_info')->with('contact_info_delete_done', 'Your deleted a piece of information from trash...');
    }

    /**
     * show contact information to public.
     *
     */
    function custom_contact_activate($id)
    {
        Contact_info::findOrFail($id)->update([
            'show_status' => 2,
            'updated_at' => Carbon::now(),
        ]);
        return redirect('customize/contact_info')->with('contact_shown_done', 'Your showed some information publically');
    }

    /**
     * hide contact information from public..
     *
     */
    public function custom_contact_deactivate($id)
    {
        Contact_info::findOrFail($id)->update([
            'show_status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        return redirect('customize/contact_info')->with('contact_unshown_done', 'Your hid some contact information form homepage..');
    }

}
