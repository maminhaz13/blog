<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.faq.faq');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $fAQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $fAQ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $fAQ)
    {
        //
    }

    // /**
    //  * Display all contact details of company.
    //  */
    // function custom_contact(){
    //     return view('admin.about.contact_infos', [
    //         'contact_info' => Contact_info::all(),
    //         'contact_trash' => Contact_info::onlyTrashed()->get(),
    //     ]);
    // }

    // /**
    //  * Add contact details here.
    //  * 
    //  */
    // function custom_contact_add(Request $request)
    // {
    //     // Validating contact information Start
    //     $validatedData = $request->validate([
    //         'email' => [ 'required', 'unique:contact_infos,email', ],
    //         'telephone' => ['required', 'unique:contact_infos,telephone', 'alpha_num'],
    //         'phone' => ['required', 'unique:contact_infos,phone',],
    //         'address' => ['unique:contact_infos,address', 'string', 'nullable'],
    //     ]);
    //     // Validating contact information End
    //     Contact_info::insert([
    //         'email' => $request->email,
    //         'telephone' => $request->telephone,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'created_at' => Carbon::now(),
    //     ]);
    //     return back()->with('contact_added', 'You added a contact information successfully');
    // }

    // /**
    //  * show edit page for contact details.
    //  *
    //  */
    // function custom_contact_edit(Request $request, $id){
    //     return view('admin.about.contact_infos_edit', [
    //         'contact_info' => Contact_info::findOrFail($id),
    //     ]);
    // }

    // /**
    //  * update edited contact details.
    //  *
    //  */
    // function custom_contact_update(Request $request, $id){
    //     Contact_info::findOrFail($id)->update([
    //         'email' => $request->email,
    //         'telephone' => $request->telephone,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'updated_at' => Carbon::now(),
    //     ]);

    //     return redirect('customize/contact_info')->with('contact_edit_done', 'Your succesfully edited your existing contact information.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  */
    // function custom_contact_trash($id){
    //     Contact_info::find($id)->delete();
    //     return redirect('customize/contact_info')->with('contact_trash_done', 'Your trashed a contact information. You can manage it in contact trash table..');
    // }

    // /**
    //  * Recover the deleted contact information.
    //  *
    //  */
    // function custom_contact_restore($id){
    //     Contact_info::withTrashed()->findOrFail($id)->restore();
    //     return redirect('customize/contact_info')->with('contact_infos_recover_done', 'Your successfully recovered a piece of information from trash..');
    // }

    // /**
    //  * delete parmanetly a piece of information here.
    //  *
    //  */
    // public function custom_contact_delete($id)
    // {
    //     Contact_info::withTrashed()->findOrFail($id)->forceDelete();
    //     return redirect('customize/contact_info')->with('contact_info_delete_done', 'Your deleted a piece of information from trash...');
    // }

    // /**
    //  * show contact information to public.
    //  *
    //  */
    // function custom_contact_activate($id)
    // {
    //     Contact_info::findOrFail($id)->update([
    //         'show_status' => 2,
    //     ]);
    //     return redirect('customize/contact_info')->with('contact_shown_done', 'Your showed some information publically');
    // }

    // /**
    //  * hide contact information from public..
    //  *
    //  */
    // public function custom_contact_deactivate($id)
    // {
    //     Contact_info::findOrFail($id)->update([
    //         'show_status' => 1,
    //     ]);
    //     return redirect('customize/contact_info')->with('contact_unshown_done', 'Your hid some contact information form homepage..');
    // }

}
