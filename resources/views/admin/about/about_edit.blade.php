@extends('layouts.admin')

@section('frontend_active')
    active
@endsection

@section('admin_content')


<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
  <a class="breadcrumb-item" href="{{ route('about.index') }}">About Us</a>
  <span class="breadcrumb-item active">Edit About Us</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
        <div class="card text-center mt-5 mb-3">
            <div class="card-header">
                Edit your about information
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('about.update', $about_info->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="col-md-12 form-group">
                        <label>Our Story</label>
                        <input type="text" class="form-control" id="" name="story" value="{{ $about_info->story }}">
                    </div>

                    <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Submit</button>
                </form>
            </div>
        </div>

  </div>
</div>



@endsection
