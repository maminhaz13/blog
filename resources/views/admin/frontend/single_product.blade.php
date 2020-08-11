@extends('layouts.frontend')

@section('frontend_content')

    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Product Details</h2>
                        <ul>
                            <li><a href="https://127.0.0.1:8000">Home</a></li>
                            <li><span>{{ $single_product_info->product_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{ asset('uploadS') }}/main_banner_picture/{{ $single_product_info->product_thumbnail_picture }}" alt="">
                            </div>
                            @foreach($single_product_info->onetomanyrelationship_with_product_multiple_table as $single_multiple_picture)
                                <div class="item">
                                    <img src="{{ asset('uploads') }}/product_multiple_picture/{{ $single_multiple_picture->product_multiple_picture }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img src="{{ asset('uploadS') }}/main_banner_picture/{{ $single_product_info->product_thumbnail_picture }}" alt="">
                            </div>
                            @foreach($single_product_info->onetomanyrelationship_with_product_multiple_table as $single_multiple_picture)
                                <div class="item">
                                    <img src="{{ asset('uploads') }}/product_multiple_picture/{{ $single_multiple_picture->product_multiple_picture }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{ $single_product_info->product_name }}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{ $single_product_info->product_price }}</span>
                            <ul class="rating pull-right">
                                @if (avg_rating_count($single_product_info->id) == 0)
                                    No rating yet..
                                @endif
                                @for($i = 0; $i < avg_rating_count($single_product_info->id); $i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                                {{-- {{ avg_rating_count($single_product_info->id) }} --}}
                                <li>({{ review_customer_count($single_product_info->id) }} Customar Review)</li>

                            </ul>
                        </div>
                        <p>{{ $single_product_info->product_short_description }}</p>
                        <ul class="input-style">
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $single_product_info->id }}">
                                <li class="quantity cart-plus-minus">
                                    <input type="text" value="1" name="product_quantity"/>
                                </li>
                                <li><button type="submit" class="btn btn-danger">Add to Cart</button></li>
                            </form>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{ $single_product_info->relationship_with_category_for_catname->category_name }}</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{{ $single_product_info->product_long_description }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5><button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">General Inquiries ?</button> </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How To Use ?</button></h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Shipping & Delivery ?</button></h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfour">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Additional Information ?</button></h5>
                                    </div>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfive">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Return Policy ?</button></h5>
                                    </div>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                            <div class="review-wrap">
                                <ul>
                                    @forelse($review_details as $review)
                                        <li class="review-items">
                                            <div class="review-img">
                                                <img src="{{ asset('front') }}/assets/images/comment/1.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h3><a href="#">{{ $review->user->name }}</a></h3>
                                                <span>27 Jun, 2019 at 2:30pm</span>
                                                <p>{{ $review->review }}.</p>
                                                <p>{{ $review->stars }}.</p>
                                                <ul class="rating">
                                                    @for($i = 0; $i < $review->stars; $i++)
                                                        <li><i class="fa fa-star"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </li>
                                    @empty
                                        
                                    @endforelse
                                </ul>
                            </div>
                            @auth
                                @if($review_form_flag ==1)
                                    <form action="{{ route('product.review') }}" method="POST">
                                    @csrf
                                        <div class="add-review">
                                            <h4>Add A Review</h4>
                                            <div class="ratting-wrap">
                                                <input type="hidden" name="order_details_id" value="{{ $order_details_id }}">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>task</th>
                                                            <th>1 Star</th>
                                                            <th>2 Star</th>
                                                            <th>3 Star</th>
                                                            <th>4 Star</th>
                                                            <th>5 Star</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>How Many Stars?</td>
                                                            <td>
                                                                <input name="stars" type="radio" name="a" value="1" />
                                                            </td>
                                                            <td>
                                                                <input name="stars" type="radio" name="a" value="2" />
                                                            </td>
                                                            <td>
                                                                <input name="stars" type="radio" name="a" value="3" />
                                                            </td>
                                                            <td>
                                                                <input name="stars" type="radio" name="a" value="4" />
                                                            </td>
                                                            <td>
                                                                <input name="stars" type="radio" name="a" value="5" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>Your Review:</h4>
                                                    <textarea name="review" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn-style">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="alert alert-warning" role="alert">
                                        <strong>You can not give review unless you buy this product..</strong>
                                    </div>
                                @endif
                            @endauth
                            @guest
                                <div class="alert alert-warning" role="alert">
                                    <strong>You have to log in first to write a review..</strong>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                @forelse($related_products as $related_product)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="featured-product-wrap">
                            <div class="featured-product-img">
                                <img src="assets/images/product/1.jpg" alt="">
                            </div>
                            <div class="featured-product-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h3><a href="{{ url('product/details') }}/{{ $related_product->slug }}">{{ $related_product->product_name }}</a></h3>
                                        <p>${{ $related_product->product_price }}</p>
                                    </div>
                                    <div class="col-5 text-right">
                                        <ul>
                                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning" role="alert">
                        <strong>Currently unavilable related products..</strong>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
    <!-- featured-product-area end -->

@endsection