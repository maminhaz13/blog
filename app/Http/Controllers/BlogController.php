<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Blog;
use Carbon\Carbon;


class BlogController extends Controller
{
    function blog(){
        return view('admin.frontend.blog', [
            'user_id' => Auth::user()->id,
        ]);
    }

    function detailsblog(){
        return view('admin.frontend.blog_details');
    }

    function writeblog($user_id){
        return view('admin.frontend.write_blog', [
            'user_id' => $user_id
        ]);
    }

    function blogwritten(Request $request, $user_id){
        Blog::insert([
            'user_id' => $user_id,
            'blog_writer' => Auth::user()->name,
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content,
            'created_at' => Carbon::now(),
        ]);
    }
}
