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
            <div class="row">
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <img src="assets/images/blog/1.jpg" alt="">
                            <ul>
                                <li>20</li>
                                <li>Janu</li>
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
                            <h3><a href="blog-details.html">British military courts use aginst protesters busines cultural...</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati nulla veniam autem veritatis, adipisci officia? Tempora necessitatibus, iusto minima maxime ipsum quae dolore repellat quaerat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <img src="assets/images/blog/2.jpg" alt="">
                            <ul>
                                <li>20</li>
                                <li>Janu</li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i>1 Love</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 12 Comments</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-gallary.html">South korea’s moon jae in sworn vowing to address north...</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati nulla veniam autem veritatis, adipisci officia? Tempora necessitatibus, iusto minima maxime ipsum quae dolore repellat quaerat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <img src="assets/images/blog/3.jpg" alt="">
                            <ul>
                                <li>25</li>
                                <li>Jun</li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i> 5 Love</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 18 Comments</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Man looking at his note remember to daily tasks...</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati nulla veniam autem veritatis, adipisci officia? Tempora necessitatibus, iusto minima maxime ipsum quae dolore repellat quaerat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <img src="assets/images/blog/8.jpg" alt="">
                            <ul>
                                <li>15</li>
                                <li>April</li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i>15 Love</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 08 Comments</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-video.html">Robots helped inspire and deep learning might become...</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati nulla veniam autem veritatis, adipisci officia? Tempora necessitatibus, iusto minima maxime ipsum quae dolore repellat quaerat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <img src="assets/images/blog/9.jpg" alt="">
                            <ul>
                                <li>25</li>
                                <li>May</li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i> 5 Love</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 30 Comments</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Defying the traditional and mainstream parties...</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati nulla veniam autem veritatis, adipisci officia? Tempora necessitatibus, iusto minima maxime ipsum quae dolore repellat quaerat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <img src="assets/images/blog/12.jpg" alt="">
                            <ul>
                                <li>01</li>
                                <li>Feb</li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i> 16 Love</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i>8 Comments</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-audio.html">Packing macron anddis insted about vote against chat...</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati nulla veniam autem veritatis, adipisci officia? Tempora necessitatibus, iusto minima maxime ipsum quae dolore repellat quaerat.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card">
                            <a href="{{ route('blog.write', $user_id) }}" class="btn btn-purple active btn-btn-sm mg-b-10">Want to write your own!! Click this.. </a>
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
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

