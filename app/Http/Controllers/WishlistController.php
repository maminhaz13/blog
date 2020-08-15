<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{
    function wishlist(){
        return view('admin.frontend.wishlist');
    }

    public function wishlist_add($product_id){
        if(Cookie::get('g_wish_id')){
            $generated_wish_id = Cookie::get('g_wish_id');
        }
        
        else{
            $generated_wish_id = str::random(10).rand(2, 9999);
            $minutes = 43200;
            Cookie::queue('g_wish_id', $generated_wish_id, $minutes);
        }

        if(WishList::where('generated_wish_id', $generated_wish_id)->where('product_id', $product_id)->exists()){
            return redirect('wishlist')->with('already_added_wish', 'The Product is already added in the wishlist. Thank You!');
        }
        
        else{
            Wishlist::insert([
                'generated_wish_id' => $generated_wish_id,
                'product_id' => $product_id,
                'user_id' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);
        }

        return redirect('wishlist')->with('wish_added', 'You have successfully added this product to wishlist..');
    }


    public function removeWishList($product_id){
        Wishlist::find($product_id)->forceDelete();
        return redirect('wishlist')->with('wish_deleted', 'You have deleted a product from your wishlist successfully');
    }

}
