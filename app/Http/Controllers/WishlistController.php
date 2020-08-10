<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{
    function wishlist(){
        return view('admin.frontend.wishlist');
    }

    function wishlist_add(Request $request, $product_id){

        if (!Wishlist::where('generated_wish_id', Cookie::get('g_wish_id'))->where('product_id', $product_id)->exists()) {
            Cookie::queue('g_wish_id' , Str::random(4).rand(2 , 1000) , 86400);
            $g_wish_id = Cookie::get('g_wish_id');

            Wishlist::insert([
                'generated_wish_id' => $g_wish_id,
                'product_id' => $product_id,
                'user_id' => Auth::user()->id,
            ]);

            return redirect('wishlist')->with('wish_added_successfully', 'You added this product in your wishlist..');
            // return 'positive';
        } 
        
        else {
            // return 'negative';
            return redirect('wishlist')->with('wish_added_before', 'This product has beed added before...');
        }
    }
}
