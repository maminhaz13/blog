@extends('layouts.frontend')

@section('menu_home_active')
    active
@endsection

@section('frontend_content')

<div class="container mt-5 mb-3">
    <div class="row">
        <div class="col-md-12">
            @if(session('subscriber_added'))
                <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong class="d-block d-sm-inline-block-force">{{ session('subscriber_added') }}</strong>
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>{{ $error }}..</strong></span>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

    <!-- slider-area start -->
    <div class="slider-area">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($banners as $single_banner)
                    <div class="swiper-slide overlay">
                        <div class="single-slider slide-inner slide-inner1" style = "background: url({{ asset('uploads') }}/main_banner_picture/{{ $single_banner->main_banner_picture }}); background-size: cover; background-repeat: no-repeat;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-lg-9 col-12">
                                        <div class="slider-content">
                                            <div class="slider-shape">
                                                <h2 data-swiper-parallax="-500">{{ $single_banner->main_banner_title }}</h2>
                                                <p data-swiper-parallax="-400">{{ $single_banner->main_banner_short_description }}</p>
                                                <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- slider-area end -->

    <!-- featured-area start -->
    <div class="featured-area featured-area2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-active2 owl-carousel next-prev-style">
                        @foreach($active_categories as $act_cat)
                            <div class="featured-wrap">
                                <div class="featured-img">
                                    <img src="{{ asset('uploads') }}/category_picture/{{ $act_cat->category_picture }}" class="img-fluid" alt="image not found">
                                    <div class="featured-content">
                                        <a href="{{ route('shop') }}">{{ $act_cat->category_name }}</a> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured-area end -->

    <!-- start count-down-section -->
    <div class="count-down-area count-down-area-sub">
        <section class="count-down-section section-padding parallax" data-speed="7">
            <div class="container">
                <div class="row">
                   <div class="col-12 col-lg-12 text-center">
                        <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                    </div>
                    <div class="col-12 col-lg-12 text-center">
                        <div class="count-down-clock text-center">
                            <div id="clock">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
    </div>
    <!-- end count-down-section -->
    <!-- product-area start -->
    <div class="product-area product-area-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Best Seller</h2>
                        <img src="{{ asset('front') }}/assets/images/section-title.png" alt="">
                    </div>
                </div>
            </div>  
            <ul class="row">
                @foreach($bestseller_desc as $bestseller)
                    @if(empty($bestseller))
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <img src="{{ asset('uploads') }}/product_thumbnail_picture/{{ product()->find($bestseller->product_id)->product_thumbnail_picture }}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
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
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!-- product-area end -->
    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest Product</h2>
                        <img src="{{ asset('front') }}/assets/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @foreach($active_products as $prodata)
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                        <div class="product-wrap">
                            <div class="product-img">
                                <style>
                                    #img {
                                        width: 700px;
                                        height: 300px;
                                        border: 1px dashed #FE2E2E;
                                        }

                                </style>
                                <span>New</span>
                                <img id="img" src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $prodata->product_thumbnail_picture }}" width="400" height="150" alt="img not found">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ url('product/details/') }}/{{ $prodata->slug }}">{{ $prodata->product_name }}</a></h3>
                                <p class="pull-left">${{ $prodata->product_price }}

                                </p>
                                <ul class="pull-right d-flex">
                                    @if (avg_rating_count($prodata->id) == 0)
                                        No rating yet..
                                    @endif
                                    @for($i = 0; $i < avg_rating_count($prodata->id); $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                    {{-- <li><i class="fa fa-star-half-o"></i></li> --}}
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="col-12 text-center">
                    <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- product-area end -->
    
    <!-- testmonial-area start -->
    <div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="test-title text-center">
                        <h2>What Our client Says</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 col-12">
                    <div class="testmonial-active owl-carousel">
                        @forelse($testmonials as $testmonial)
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>{{ $testmonial->reviewer_name }}</p>
                                    <h2>{{ $testmonial->review_full }}</h2>
                                </div>
                                <div class="test-img2">
                                    <img src="{{ asset('uploads') }}/profile_pictures/{{ $testmonial->testmonial_user->profile_pictures }}" alt="user image null">
                                </div>
                            </div>
                        @empty
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <h2>Currently No Review Given</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial-area end -->


@endsection

