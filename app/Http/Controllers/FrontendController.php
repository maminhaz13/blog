<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Image;
use App\Home;
use App\User;
use App\Contact;
use App\Product;
use App\Category;
use Carbon\Carbon;
use App\Subscriber;
use App\Testmonial;
use App\Order_details;
use App\Mail\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('customer/home');
        }

    }

    function index(){
        return view('admin.frontend.landing', [
            'active_categories' => Category::all(),
            'active_products' => Product::all(),
            'banners' => Home::all(),
            'testmonials' => Testmonial::all(),
        ]);
    }
    
    function about(){
        return view('about');
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

        return back();
        // Mail::to(User::find(17)->email)->send(new NewsLetter());
        // return 'done';
    }

    function usertestmonial(Request $request){
        Testmonial::insert($request->except('_token'), [
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    function frontend()
    {
        return view('admin.frontend.homepage');
    }

    function frontend_mainbanner_post(Request $request){
        $banner_id = Home::insertGetId([
            'main_banner_title' => $request->main_banner_title,
            'main_banner_short_description' => $request->main_banner_short_description,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('main_banner_picture')){

            $uploaded_picture = $request->file('main_banner_picture');
            $photo_file_extention = $banner_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_new_location = 'public/uploads/main_banner_picture/'.$photo_file_extention;
            Image::make($uploaded_picture)->resize(500,500)->save(base_path($picture_new_location));
            Home::find($banner_id)->update([
                'main_banner_picture' => $photo_file_extention,
            ]);
            
        }

        return back()->with('main_banner_update_done', 'Your succesfully added new banner.');
    }

    function frontend_discountbanner_post(Request $request){
        $banner_id = Home::insertGetId([
            'discount_banner_title' => $request->discount_banner_title,
            'discount_banner_percentage' => $request->discount_banner_percentage,
            'discount_banner_text_one' => $request->discount_banner_text_one,
            'discount_banner_text_two' => $request->discount_banner_text_two,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('discount_banner_picture')){

            $uploaded_picture = $request->file('discount_banner_picture');
            $photo_file_extention = $banner_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_new_location = 'public/uploads/discount_banner_picture/'.$photo_file_extention;
            Image::make($uploaded_picture)->resize(500,500)->save(base_path($picture_new_location));
            Home::find($banner_id)->update([
                'discount_banner_picture' => $photo_file_extention,
            ]);
        }

        return back()->with('discount_banner_update_done', 'Your succesfully added new discount banner.');
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
        ]);
        return back();
    }

    function subscriber(Request $request){
        $request->validate([
        'subscriber' => 'email:rfc,dns',
        ]);

        Subscriber::insert([
            'subscriber' => $request->subscriber,
            'created_at' => Carbon::Now()
        ]);
        return redirect('/');
    }
}
