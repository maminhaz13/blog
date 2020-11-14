<?php

  function total_product_count(){
    return App\Product::count();
  }

  function cart_product_quantity(){
    return App\Cart::where('generated_cart_id', Cookie::get('g_cart_id'))->count();
  }

  function cart_items(){
    return App\Cart::where('generated_cart_id', Cookie::get('g_cart_id'))->get();
  }

  function review_customer_count($product_id){
    return App\Order_details::where('product_id', $product_id)->WhereNotNull('review')->count();
  }

  function avg_rating_count($product_id){
    $stars_count = App\Order_details::where('product_id', $product_id)->WhereNotNull('review')->count();
    $sum_amount = App\Order_details::where('product_id', $product_id)->WhereNotNull('review')->sum('stars');
    if($sum_amount == 0){
      return 0;
    }
    else{
      return $sum_amount/$stars_count;
    }
  }
  
  // wishList Items and counter starts
  function wish_items(){
      return App\Wishlist::where('generated_wish_id', Cookie::get('g_wish_id'))->get();
  }

  function wish_count(){
      return App\Wishlist::where('generated_wish_id', Cookie::get('g_wish_id'))->count();
  }
  // wishList Items and counter ends

  function product(){
    return App\Product::all();
  }

  function category(){
    return App\Category::all();
  }

  //auth check for feedback form start
  function review_show_status(){
    if (Auth::check()) {
        return 1;
    }

    else{
      return 0;
    }
  } 
  //auth check for feedback form end

  //contact info all
  function contact_info(){
    return App\Contact_info::where('show_status', 2)->latest()->get();
  //contact info end
  }

  //contact info all
  function contact_info_header(){
    return App\Contact_info::where('show_status', 2)->latest()->get()->take(1);
  //contact info end
  }

  //users info all
  function users(){
    return App\User::all();
  }
