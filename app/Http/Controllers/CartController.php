<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    function cart_store(Request $request){

    if(Cookie::get('g_cart_id')){
        $generator_cart_id = Cookie::get('g_cart_id');
    }

    else {
        $generator_cart_id = Str::random(5).rand(2 , 1000);
        Cookie::queue('g_cart_id' , $generator_cart_id , 1440);
    }

    if(Cart::where('generated_cart_id' , $generator_cart_id)->where('product_id' , $request->product_id)->exists()){
        Cart::where('generated_cart_id' , $generator_cart_id)->where('product_id' , $request->product_id)->increment('product_quantity' , $request->product_quantity);
    }

    else {
        Cart::insert([
            'generated_cart_id' => $generator_cart_id,
            'product_id' => $request->product_id,
            'product_quantity' => $request->product_quantity,
            'created_at' => Carbon::now(),
        ]);
    }

    return back();
    }

    // function cart(){
    //     return view('admin.frontend.cart');
    // }

    function cart($coupon_name = ""){
        $coupon_error ="";
        $coupon_discount =0;

        if($coupon_name == ""){
            $coupon_error ="";
        }

        else{
            if(!Coupon::where('coupon_name', $coupon_name)->exists()){
                $coupon_error = "You entered wrong coupon code..Please retry with correct one..";
            }

            else{
                if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_name)->first()->valid_till){
                    $coupon_error = "You entered invalid coupon code..Please retry with a valid one..";
                }

                else{

                    $sub_total = 0;
                    foreach (cart_items() as $cart_item) {
                        $sub_total = $sub_total + ($cart_item->product_quantity * $cart_item->relationship_with_cart->product_price);
                    }

                    if(Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchase_amount > $sub_total){
                        $coupon_error = "You have to buy minumum ".Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchase_amount." taka in total..";
                    }

                    else{
                        $coupon_discount = Coupon::where('coupon_name', $coupon_name)->first()->offerd_discount;
                    }
                }
            }
        }

        return view('admin.frontend.cart', compact('coupon_discount', 'coupon_error', 'coupon_name'));
    }

    function cart_delete($cart_id){
        return Cart::find($cart_id)->forceDelete();
        return back();
    }

    function cart_update(Request $request){
        foreach ($request->product_info as $cart_id => $product_quantity) {
            Cart::find($cart_id)->update([
                'product_quantity' => $product_quantity,
            ]);
        };
        return back();
    }
}