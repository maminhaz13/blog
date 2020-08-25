<?php

namespace App\Http\Controllers;

use App\About;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.about.about_manage', [
            'about_info' => About::latest()->get(),
            'about_trash' => About::onlyTrashed()->get(),
        ]);
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
        About::insert([
            'story' => $request->story,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('about_added', 'You added a story successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.about.about_edit', [
            'about_info' => About::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        About::findOrFail($id)->update([
            'story' => $request->story,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('about')->with('about_edit_done', 'Your succesfully edited your existing about information.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::find($id)->delete();
        return redirect('about')->with('about_trash_done', 'Your trashed a information of about page. You can manage it in about trash table..');
    }

    /**
     * Recover the deleted about us information.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        About::withTrashed()->findOrFail($id)->restore();
        return redirect('about')->with('about_recover_done', 'Your successfully recovered a piece of information from trash table..');
    }

    /**
     * delete parmanetly a piece of information here.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        About::withTrashed()->findOrFail($id)->forceDelete();
        return redirect('about')->with('about_info_delete_done', 'Your deleted a piece of information from trash table');
    }

    /**
     * activate a piece of information here.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        About::findOrFail($id)->update([
            'show_status' => 2,
        ]);
        return redirect('about')->with('about_shown_done', 'Your showed some information publically');
    }

    /**
     * deactivate a piece of information here.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        About::findOrFail($id)->update([
            'show_status' => 1,
        ]);
        return redirect('about')->with('about_unshown_done', 'Your hid some information form puclic page..');
    }
}
