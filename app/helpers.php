<?php

  function total_product_count(){
    print_r(App\Product::count());
  }

  function cart_product_quantity(){
    return App\Cart::where('generated_cart_id', Cookie::get('g_cart_id'))->count();
  }

  function cart_items(){
    return App\Cart::where('generated_cart_id', Cookie::get('g_cart_id'))->get();
    // return App\Cart::all();
  }
