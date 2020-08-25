@extends('layouts.frontend')

@section('menu_about_active')
    active
@endsection

@section('frontend_content')


    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>About us</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>About</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- about-area start -->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-wrap text-center">
                        <h3>Welcome Our Store! </h3>
                        @forelse ($our_stories as $story)
                            <p class="mb-0">{{ $story->story }}</p>
                        @empty
                            <p class="mb-0"> Author did not share story... Keep patience till author write stories  </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->
    <!-- product-area start -->
    <div class="product-area product-area-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Best Seller Products</h2>
                        <img src="{{ asset('front') }}/assets/images/section-title.png" alt="">
                    </div>
                </div>
            </div>  
            <ul class="row">
                @foreach($bestseller_desc as $bestseller)
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <img src="{{ asset('uploads') }}/product_thumbnail_picture/{{ product()->find($bestseller->product_id)->product_thumbnail_picture }}" alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href={{ route('wishlist.add', $bestseller->product_id) }}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="single-product.html">{{ product()->find($bestseller->product_id)->product_name }}</a></h3>
                                <p class="pull-left">${{ product()->find($bestseller->product_id)->product_price }}
                                    <del>$156</del>
                                </p>
                                <ul class="pull-right d-flex">
                                    @if (avg_rating_count($bestseller->product_id) == 0)
                                        No rating yet..
                                    @endif
                                    @for($i = 0; $i < avg_rating_count($bestseller->product_id); $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- product-area end -->



@endsection

