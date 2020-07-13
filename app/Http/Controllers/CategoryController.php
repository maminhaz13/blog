<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;
use App\Category;
use Carbon\Carbon;
use Auth;
use App\User;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    function add_category(){
        $deleted_data = Category::onlyTrashed()->get();
        $categories = Category::all(); 
        return view('admin/category/add_category', compact('categories', 'deleted_data'));

    }
    
    function add_category_post(CategoryForm $request){

        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('category_picture')){

            $uploaded_picture = $request->file('category_picture');
            $photo_file_extention = $category_id.".".$uploaded_picture->getClientOriginalExtension('profile_picture');
            $picture_new_location = 'public/uploads/category_picture/'.$photo_file_extention;
            Image::make($uploaded_picture)->resize(500,500)->save(base_path($picture_new_location), 20);
            Category::find($category_id)->update([
                'category_picture' => $photo_file_extention
            ]);

            return back()->with('picture_up_done', 'Your category picture added successfully');      
        }

        return back()->with('done_status',' data submitted successfully');
    }

    function delete_category($category_id){
        Category::find($category_id)->delete();
        return back()->with('delete_status', 'Your category trashed successfully');
    }

    function edit_category($category_id){
        $edit_data = Category::findOrFail($category_id);
        return view('admin/category/edit_category', compact('edit_data'));
    }

    function edit_category_post(Request $request){

        $request->validate([
        'category_name' => 'unique:categories,category_name,'.$request->category_id,
        ]);

        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);

        return redirect('category/add')->with('edit_status', 'Your category edited successfully');
    }

    function restore_category($category_id){
        Category::withTrashed()->find($category_id)->restore();
        return back()->with('restore_status', 'Your category restored successfully');
    }

    function harddelete_category($category_id){
        Category::withTrashed()->find($category_id)->forceDelete();
        return back()->with('forever_delete', 'Your category deleted for forever.');
    }

    function markdelete_category(Request $request){

        if(isset($request->category_id)){

            foreach ($request->category_id as $mark_catid) {
                Category::find($mark_catid)->delete();
            }

        return back()->with('mark_deleted', 'Your marked category deleted successfully');

        }

        else{

        return back()->with('mark_deleted_error', 'Your did not marked category');

        }

    }

    function markrestore_category(Request $request){

        if(isset($request->re_category_id)){

            foreach ($request->re_category_id as $restore_catid) {

                Category::withTrashed()->find($restore_catid)->restore();            
            }

            return back()->with('mark_restore','Your marked category restored successfully');
        }

        else{
            return back()->with('mark_restore_error','Your did not marked your categories');
        }
    }
}
