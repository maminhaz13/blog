<?php

namespace App\Http\Controllers;

use Image;
use App\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.frontend.banner', [
            'banner_info' => Banner::all(),
            'banner_trash' => Banner::onlyTrashed()->get(),
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
        $banner_id = Banner::insertGetId([
            'main_banner_title' => $request->main_banner_title,
            'main_banner_short_description' => $request->main_banner_short_description,
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('main_banner_picture')){

            $uploaded_picture = $request->file('main_banner_picture');
            $photo_file_extention = $banner_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_new_location = 'public/uploads/main_banner_picture/'.$photo_file_extention;
            Image::make($uploaded_picture)->resize(500,500)->save(base_path($picture_new_location));
            Banner::find($banner_id)->update([
                'main_banner_picture' => $photo_file_extention,
            ]);
        }

        return back()->with('main_banner_update_done', 'Your succesfully added new banner.');
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
        return view('admin.frontend.banner_edit', [
            'banner_edit' => Banner::find($id),
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
        Banner::find($id)->update([
            'main_banner_title' => $request->main_banner_title,
            'main_banner_short_description' => $request->main_banner_short_description,
            'created_at' => Carbon::now()
        ]);

        return redirect('banner')->with('main_banner_edit_done', 'Your succesfully edited your existing banner.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect('banner')->with('main_banner_trash_done', 'Your trashed a banner. You can manage it in banner trash table..');
    }

    /**
     * Restore a banner here.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Banner::withTrashed()->findOrFail($id)->restore();
        return redirect('banner')->with('main_banner_restore_done', 'Your restored a banner successfully');
    }

    /**
     * delete parmanetly a banner here.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Banner::withTrashed()->findOrFail($id)->forceDelete();
        return redirect('banner')->with('main_banner_delete_done', 'Your deleted a banner successfully');
    }
}
