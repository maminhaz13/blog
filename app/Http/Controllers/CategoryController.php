<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\User;
use App\Category;
use Carbon\Carbon;
use App\ChildCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;

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
                'category_picture' => $photo_file_extention,
                'updated_at' => Carbon::now(),
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
            'updated_at' => Carbon::now(),
        ]);

        return redirect('category/add')->with('edit_status', 'Your category edited successfully');
    }

    function restore_category($category_id){
        Category::withTrashed()->find($category_id)->restore();
        return back()->with('restore_status', 'Your category restored successfully');
    }

    function harddelete_category($category_id){
        //delete picture from storage start
        $cat = Category::withTrashed()->find($category_id);
        if($cat->category_picture != 'default_cat_pic.png'){
            $old_picture_location = 'public/uploads/category_picture/'.$cat->category_picture;
            unlink(base_path($old_picture_location));
        }
        //delete picture from storage end

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

    function child_category(){
        return view('admin.child_category.index', [
            'categories' => Category::all(),
            'child_categories' => ChildCategory::all(),
            'trashed_child_categories' => ChildCategory::onlyTrashed()->get(),
        ]);
    }

    function child_category_add(Request $request){
        $child_cat_id = ChildCategory::insertGetId([
            'category_id' => $request->category_id,
            'child_category_name' => $request->child_category_name,
            'child_category_desc' => $request->child_category_desc,
            'addedby' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('child_category_pic')){
            $uploaded_picture = $request->file('child_category_pic');
            $photo_file_extention = "Child_category"."_".$child_cat_id.".".$uploaded_picture->getClientOriginalExtension('child_category_pic');
            $picture_new_location = 'public/uploads/child_category_pic/'.$photo_file_extention;
            Image::make($uploaded_picture)->save(base_path($picture_new_location));
            ChildCategory::find($child_cat_id)->update([
                'child_category_pic' => $photo_file_extention,
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('child_category')->with('child_category_added', 'You have added '.$request->child_category_name.' as a child category of '. Category::findOrFail($request->category_id)->category_name);
    }

    public function child_category_edit(Request $request, $id){
        return view('admin.child_category.edit', [
            'child_categories' => ChildCategory::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }

    public function child_category_edit_post(Request $request){
        ChildCategory::findOrFail($request->id)->update([
            'category_id' => $request->category_id,
            'child_category_name' => $request->child_category_name,
            'child_category_desc' => $request->child_category_desc,
            'addedby' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('child_category')->with('child_category_edited', 'You have updated '.$request->child_category_name);
    }

    public function child_category_trash(Request $request, $id){
        ChildCategory::findOrFail($id)->delete();
        return redirect()->route('child_category')->with('child_category_trashed', 'You have trashed a child category');
    }

    public function child_category_recover(Request $request, $id){
        ChildCategory::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('child_category')->with('child_category_restored', 'You have restored a child category');
    }

    public function child_category_delete(Request $request, $id){
        ChildCategory::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('child_category')->with('child_category_deleted', 'You have deleted a child category');
    }

    function child_category_mark_trash(Request $request){
        if(isset($request->child_category_id)){
            foreach ($request->child_category_id as $mark_child_catid) {
                ChildCategory::findOrFail($mark_child_catid)->delete();
            }

            return back()->with('child_cat_mark_deleted', 'Your marked child category deleted successfully');
        }

        else{
            return back()->with('child_cat_mark_deleted_err', 'Your did not marked any child category');
        }
    }

    function child_category_mark_recover(Request $request){
        if(isset($request->child_category_id)){
            foreach ($request->child_category_id as $mark_child_catid) {
                ChildCategory::findOrFail($mark_child_catid)->delete();
            }

            return back()->with('child_cat_mark_deleted', 'Your marked child category deleted successfully');
        }

        else{
            return back()->with('child_cat_mark_deleted_err', 'Your did not marked any child category');
        }
    }
}
