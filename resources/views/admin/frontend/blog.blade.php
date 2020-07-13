@extends('layouts.frontend')

@section('menu_blog_active')
    active
@endsection


@section('frontend_content')


    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Blog Page</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><span>Blog</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- blog-area start -->
    <div class="blog-area">
        <div class="container">
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Latest News</h2>
                    <img src="assets/images/section-title.png" alt="">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>
                        @if(session()->has('blog_thumbnail_picture_up_done'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                    <span><strong>Well done!</strong> {{ session()->get('blog_thumbnail_picture_up_done') }}.</span>
                                </div>
                            </div>
                        @endif
                    </h2>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>
                        @if(session()->has('blog_created_done'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                    <span><strong>Well done!</strong> {{ session()->get('blog_created_done') }}.</span>
                                </div>
                            </div>
                        @endif
                    </h2>
                </div>
            </div>

            <div class="row">
                @foreach($blog_data as $blog)
                    <div class="col-lg-4  col-md-6 col-12">
                        <div class="blog-wrap">
                            <div class="blog-image">
                                <img src="{{ asset('uploads') }}/blog_thumbnail_picture/{{ $blog->blog_thumbnail_picture }}" alt="">
                                <ul>
                                    <li>{{ $blog->created_at->format('d') }}</li>
                                    <li>{{ $blog->created_at->format('M') }}</li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i> Love</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 15 Comments</a></li>
                                    </ul>
                                </div>
                                <h3><a href="{{ url('blog/details') }}/{{ $blog->slug }}">{{ $blog->blog_title }}...</a></h3>
                                <p>{{ $blog->blog_content }}.</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-3 mb-3">
                    <div class="card">
                            <a href="{{ route('blog.write') }}" class="btn btn-purple active btn-btn-sm mg-b-10">Want to write your own!! Click this.. </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pagination-wrapper text-center mb-30">
                        <ul class="page-numbers">
                            <li><a class="prev page-numbers" href="#"><i class="fa fa-arrow-left"></i></a></li>
                            <li><span class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="next page-numbers" href="#"><i class="fa fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->
    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
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


@endsection

