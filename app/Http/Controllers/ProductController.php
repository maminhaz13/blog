<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Product;
use App\Category;
use Carbon\Carbon;
use App\Picture_Multiple;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStore;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin/product/index', [
            'category_data' => Category::all(),
            'product_data' => Product::all(),
            'deleted_product_data' => Product::onlyTrashed()->get(),
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
        $cat_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_quantity' => $request->product_quantity,
            'product_alert_quantity' => $request->product_alert_quantity,
            'product_price' => $request->product_price,
            'slug' => Str::slug($request->product_name, '-').'-'.Str::random(5),
        ]);
        
        if ($request->hasFile('product_thumbnail_picture')) {
            $uploaded_picture = $request->file('product_thumbnail_picture');
            $picture_name = $cat_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/product_thumbnail_picture/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            Product::find($cat_id)->update([
                'product_thumbnail_picture' => $picture_name
            ]);      
        }

        if($request->hasFile('product_multiple_picture')){

            $flag = 1;

            foreach ($request->file('product_multiple_picture') as $single_picture) {
                $uploaded_picture = $single_picture;
                $picture_name = $cat_id."-".$flag.".".$uploaded_picture->getClientOriginalExtension();
                $picture_location = 'public/uploads/product_multiple_picture/'.$picture_name;
                Image::make($uploaded_picture)->save(base_path($picture_location));

                $flag++;

                Picture_Multiple::insert([
                    'product_id' => $cat_id,
                    'product_multiple_picture' => $picture_name,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        return back()->with('product_insert_success', 'Your product added to store successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit', [
            'product_info' => Product::findOrFail($id),
            'category_info' => Category::all(),
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        Product::find($id)->update($request->except('_token', '_method'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        Product::find($id)->delete();
        return back()->with('product_trashed', 'Your product has been moved to trash successfully');
    }

    /**
     * Restore the marked products.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productrestore(Request $request, $id){
        Product::withTrashed()->find($id)->restore();
        return back()->with('product_restore_success', 'Your product Restored successfully');
    }

    /**
     * Delete the marked products forever.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productforeverdelete(Request $request, $id){
        // //delete picture from storage start
        // $product = Product::withTrashed()->find($id);
        // if($product->product_thumbnail_picture != 'default_product_thumbnail_photo'){
        //     $old_picture_location = 'public/uploads/product_thumbnail_picture/'.$product->product_thumbnail_picture;
        //     unlink(base_path($old_picture_location));
        // }
        // //delete picture from storage end

        Product::withTrashed()->find($id)->forceDelete();
        return back()->with('product_force_delete_success', 'Your product Deleted for forever successfully');
    }

    /**
     * Delete the marked products forever.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_mark_delete(Request $request, $id){
        return "hello";
    }
}
