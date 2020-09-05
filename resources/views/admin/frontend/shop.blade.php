@extends('layouts.frontend')

@section('menu_shop_active')
    active
@endsection


@section('frontend_content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="{{ route('shop') }}">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-lg-10">
                    <div class="product-menu">
                        <ul class="nav">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                            @foreach($categories as $category)
                              <li>
                                  <a data-toggle="tab" href="#category_id_{{ $category->id }}">{{ $category->category_name }}</a>
                              </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-2">
                    <div class="filter-menu text-right">
                        <a href="javascript:void(0);">Filter</a>
                    </div>
                </div>
            </div>
            <div class="row filter-active">
                <div class="col-12">
                    <div class="filter-wrap">
                        <div class="row">
                            <div class="product-filter col-lg-3 col-sm-6 col-12">
                                <h3 class="filter-title">Sort by</h3>
                                <ul class="sort-by">
                                    <li><a href="#">Default</a></li>
                                    <li><a href="#">Popularity</a></li>
                                    <li><a href="#">Average rating</a></li>
                                    <li><a href="#">Newness</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                </ul>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-lg-3 col-sm-6 col-12">
                                <h3 class="filter-title">color filters</h3>
                                <ul class="color-filter">
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Orange</a></li>
                                    <li><a href="#">red</a></li>
                                    <li><a href="#">Yellow</a></li>
                                </ul>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-lg-3 col-sm-6 col-12">
                                <h3 class="filter-title">product tags</h3>
                                <ul class="product-tags">
                                    <li><a href="#">New</a></li>
                                    <li><a href="#">brand</a></li>
                                    <li><a href="#">black</a></li>
                                    <li><a href="#">white</a></li>
                                    <li><a href="#">Honey</a></li>
                                    <li><a href="#">table</a></li>
                                    <li><a href="#">Lorem</a></li>
                                    <li><a href="#">ipsum</a></li>
                                    <li><a href="#">dolor</a></li>
                                    <li><a href="#">sit</a></li>
                                    <li><a href="#">amet</a></li>
                                </ul>
                            </div>
                            <div class="product-filter col-lg-3 col-sm-6 col-12">
                                <h3 class="filter-title">Filter by Price</h3>
                                <div class="filter-price">
                                    <form action="#">
                                        <div id="slider-range"></div>
                                        <div class="row">
                                            <div class="col-7">
                                                <p>Price :
                                                    <input type="text" id="amount">
                                                </p>
                                            </div>
                                            <div class="col-5 text-right">
                                                <button>filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">
                        @foreach($products as $single_product)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <style>
                                            #img {
                                                width: 700px;
                                                height: 300px;
                                                border: 1px dashed #FE2E2E;
                                                border-style: 2px dotted solid double dashed #FE2E2E;
                                                }

                                            /* img {
                                                width: 90%;
                                                height: 60%;
                                            } */
                                        </style>
                                        <span>Sale</span>
                                        <img id="img" src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $single_product->product_thumbnail_picture }}" class="img-fluid" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="{{ route('wishlist.add', $single_product->id) }}"><i class="fa fa-heart"></i></a></li>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $single_product->id }}">
                                                    <input type="hidden" name="product_quantity" value="{{ 1 }}">
                                                    <li><button type="submit" class="btn btn-danger">Add to Cart</button></li>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{ url('product/details/') }}/{{ $single_product->slug }}">{{ $single_product->product_name }}</a></h3>
                                        <p class="pull-left">${{ $single_product->product_price }}
                                            <del>$156</del>
                                        </p>
                                        <ul class="pull-right d-flex">
                                            @if (avg_rating_count($single_product->id) == 0)
                                                No rating yet..
                                            @endif
                                            @for($i = 0; $i < avg_rating_count($single_product->id); $i++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
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
                @foreach($categories as $category)
                    <div class="tab-pane" id="category_id_{{ $category->id }}">
                        <ul class="row">
                            @foreach($category->onetomanyrelationship_with_product_table as $product_data)
                                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <div class="product-wrap">
                                        <div class="product-img">
                                            <style>
                                                #img1 {
                                                    width: 700px;
                                                    height: 300px;
                                                    border: 1px dashed #FE2E2E;
                                                    }

                                                /* img {
                                                    width: 90%;
                                                    height: 60%;
                                                } */
                                            </style>
                                            <span>Sale</span>
                                            <img id="img1" src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $product_data->product_thumbnail_picture }}" height="500" width="700" alt="">
                                            <div class="product-icon flex-style">
                                                <ul>
                                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="{{ route('wishlist.add', $product_data->id) }}"><i class="fa fa-heart"></i></a></li>
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $single_product->id }}">
                                                        <input type="hidden" name="product_quantity" value="{{ 1 }}">
                                                        <li><button type="submit" class="btn btn-danger">Add to Cart</button></li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="product-content">
                                            {{-- @foreach($products as $single_product) --}}
                                                <h3><a href="{{ url('product/details/') }}/{{ $product_data->slug }}">{{ $product_data->product_name }}</a></h3>
                                            {{-- @endforeach --}}
                                            <p class="pull-left">${{ $product_data->product_price }}
                                                <del>$156</del>
                                            </p>
                                            <ul class="pull-right d-flex">
                                                @if (avg_rating_count($single_product->id) == 0)
                                                    No rating yet..
                                                @endif
                                                @for($i = 0; $i < avg_rating_count($single_product->id); $i++)
                                                    <li><i class="fa fa-star"></i></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- product-area end -->


@endsection

