<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Support\Str;



class BlogController extends Controller
{
    function blog(){
        return view('admin.frontend.blog', [
            'blog_data' => Blog::all()
        ]);
    }

    function detailsblog(){
        return view('admin.frontend.blog_details');
    }

    function writeblog(){
        if (Auth::check()) {
            return view('admin.frontend.write_blog');
        } 

        else {
            return redirect('login');
        }
    }

    function blogwritten(Request $request){
        $blog_id = Blog::insertGetId([
            'user_id' => $request->user()->id,
            'blog_writer' => $request->user()->name,
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content,
            'slug' => Str::slug($request->blog_title, '-')."-".Str::random(10),
            'created_at' => Carbon::now(),
        ]);

        return redirect('blog')->with('blog_created_done', 'Your created a blog post successfully');

        if ($request->hasFile('blog_thumbnail_picture')){
            $uploaded_picture = $request->file('blog_thumbnail_picture');
            $photo_file_extention = "blog_thumbnail_picture"."_".$blog_id.".".$uploaded_picture->getClientOriginalExtension('blog_thumbnail_picture');
            $picture_new_location = 'public/uploads/blog_thumbnail_picture/'.$photo_file_extention;
            Image::make($uploaded_picture)->resize(500,500)->save(base_path($picture_new_location), 20);
            Blog::find($blog_id)->update([
                'blog_thumbnail_picture' => $photo_file_extention
            ]);

            return redirect('blog')->with('blog_thumbnail_picture_up_done', 'Your added blog thumbnail picture successfully');
        }
    }
}
