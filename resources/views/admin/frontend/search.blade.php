@extends('layouts.frontend')

@section('frontend_content')


    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Your search results ({{ $products->count() }})</h2>
                    </div>
                </div>
            </div>
            <ul class="row">
                @foreach($products as $prodata)
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
            </ul>
        </div>
    </div>
    <!-- product-area end -->



@endsection

