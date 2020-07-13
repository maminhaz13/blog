@extends('layouts.frontend')

@section('frontend_content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <div class="col-lg-8 col-12 mt-5 mb-3">
                <div class="contact-form form-style">
                    <div class="cf-msg" style="display: none;"></div>
                    <form action="{{ route('blogwritten', $user_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <div class="col-12 col-sm-6">
                                <input type="text" placeholder="Enter your blog title" name="blog_title">
                            </div>
                            <div class="col-12">
                                <textarea class="contact-textarea" placeholder="Enter your blog content" name="blog_content"></textarea>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="file" name="blog_thumbnail_picture" src="" alt="image not found" width="48" height="48">
                            </div>
                            <div class="col-12">
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

