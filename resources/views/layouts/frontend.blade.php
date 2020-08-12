<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 May 2020 10:01:24 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="{{ asset('front') }}/assets/image/png" href="{{ asset('front') }}/assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.7 css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{ asset('front') }}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
    <!--Start Preloader-->
    {{-- <div class="preloader-wrap">
        <div class="spinner"></div>
    </div> --}}
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="http://themepresss.com/tf/html/tohoney/search">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                @auth
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-user"></i> {{ Auth::user()->name ? Auth::user()->name : 'My Account' }} <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown_style">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Login
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endauth
                                @guest
                                    <a href=""><i class="fa fa-user"></i> My Account ></i></a>
                                @endguest
                            </li>
                            <li><a href="{{ route('user.registration') }}"> Login/Register </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="index-2.html">
                        <img src="{{ asset('front') }}/assets/images/logo.png" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="@yield('menu_home_active')">
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="@yield('menu_about_active')">
                                    <a href="about.html">About</a>
                                </li>
                                <li class="@yield('menu_shop_active')">
                                    <a href="{{ route('shop') }}">Shop</a>
                                </li>
                                <li class="@yield('menu_wishlist_active')">
                                    <a href="{{ route('wishlist') }}">Wishlist</a>
                                </li>
                                <li class="@yield('menu_blog_active')">
                                    <a href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li class="@yield('menu_contact_active')">
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>2</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="assets/images/cart/1.jpg" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ asset('front') }}/assets/images/cart/3.jpg" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li>Subtotol: <span class="pull-right">$70.00</span></li>
                                    <li>
                                        <button>Check Out</button>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ cart_product_quantity() }}</span></a>
                                    <ul class="cart-wrap dropdown_style">
                                        @php
                                            $sub_total = 0;
                                        @endphp
                                        @foreach(cart_items() as $cart_item)
                                            <li class="cart-items">
                                                <div class="cart-img box">
                                                    <style>
                                                        .box {
                                                            width: 70px;
                                                            height: 90px;
                                                            /* border: 3px dashed #FE2E2E; */
                                                            }

                                                        /* img {
                                                            width: 50%;
                                                            height: 50%;
                                                        } */
                                                    </style>
                                                    <img src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $cart_item->relationship_with_cart->product_thumbnail_picture }}" class="img-fluid" height="150" width="200" alt="">
                                                </div>
                                                <div class="cart-content">
                                                    <a href="{{ url('product/details/') }}/{{ $cart_item->relationship_with_cart->slug }}">{{ $cart_item->relationship_with_cart->slug }}</a>
                                                    <span>QTY : {{ $cart_item->product_quantity }}</span>
                                                    <p>${{ $cart_item->product_quantity * $cart_item->relationship_with_cart->product_price }}</p>
                                                    <a href="{{ route('cart.delete', $cart_item->id) }}"><i class="fa fa-times"></i></a>
                                                </div>
                                            </li>
                                            @php
                                                $sub_total = $sub_total + ($cart_item->product_quantity * $cart_item->relationship_with_cart->product_price)
                                            @endphp
                                        @endforeach
                                        <li>Subtotal: <span class="pull-right">${{ $sub_total }}</span></li>
                                        <li>
                                            <a href="{{ route('cart') }}">Go To Cart</butaton>
                                        </li>
                                    </ul>

                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li>
                                    <a href="{{ route('index') }}">Home Main</a>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li>
                                    <a href="shop.html">Shop</a>
                                </li>
                                    <a href="{{ url('wishlist') }}">Wishlist</a>
                                </li>
                                <li >
                                    <a href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->


    @yield('frontend_content')


    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">

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

                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form action="{{ route('subscriber') }}" method="POST">
                                @csrf
                                <input name="subscriber" type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class=" col-8 m-auto justify-content-center mt-5">
                <div class="card">
                    <div class="card-header">Review Submit Form</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('user/testmonial') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Your Name</label>
                                <input type="text" name="reviewer_name" class="form-control" id="">
                            </div>

                            <div class="form-group">
                                <label for="">Your Email Address</label>
                                <input type="email" name="reviewer_email" class="form-control" id="" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="">Your Position</label>
                                <input type="text" name="reviewer_position" class="form-control" id="">
                            </div>

                            <div class="form-group">
                                <label for="">Email Subject for Review</label>
                                <input type="text" name="review_subject" class="form-control" id="" >
                            </div>

                            <div class="form-group">
                                <label for="">Review </label>
                                <textarea type="text" name="review_full" class="form-control" name="" rows="4" cols="50"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © 2019 Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->
    <!-- Modal area start -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{ asset('front') }}/assets/images/product/product-details.jpg" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>Pure Nature Hohey</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">$219.56</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire denounce with righteous indignation</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="1" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">Honey,</a></li>
                            <li><a href="#">Olive Oil</a></li>
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
        </div>
    </div>
    <!-- Modal area start -->
    <!-- jquery latest version -->
    <script src="{{ asset('front') }}/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('front') }}/assets/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('front') }}/assets/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{ asset('front') }}/assets/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ asset('front') }}/assets/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ asset('front') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ asset('front') }}/assets/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{ asset('front') }}/assets/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{ asset('front') }}/assets/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ asset('front') }}/assets/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{ asset('front') }}/assets/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ asset('front') }}/assets/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('front') }}/assets/js/scripts.js"></script>
    <!-- select2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    
    @yield('footer_scripts')
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 May 2020 10:01:24 GMT -->
</html>