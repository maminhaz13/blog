@extends('layouts.admin')

@section('frontend_active')

@endsection

@section('admin_content')


<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="index.html">Starlight</a>
  <a class="breadcrumb-item" href="index.html">Pages</a>
  <span class="breadcrumb-item active">Blank Page</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Blank Page</h5>
    <p>This is a starter page</p>
  </div>

        <div class="card text-center mt-5 mb-3">
            <div class="card-header">
                Edit Banner
            </div>
            <div class="card-body">
            <h5 class="card-title">Edit Your Main Banner Here</h5>
            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
            <form method="POST" action="{{ route('banner.update', $banner_edit->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="col-md-12 form-group">
                <label>Main Banner Title</label>
                <input type="text" class="form-control" id="" name="main_banner_title" value="{{ $banner_edit->main_banner_title }}">
                </div>

                <div class="col-md-12 form-group">
                <label>Main Banner Text</label>
                <input type="text" class="form-control" id="" name="main_banner_short_description" value="{{ $banner_edit->main_banner_short_description }}">
                </div>

                <div class="form-group">
                <label >Main Banner Picture</label>
                    <input type="file" name="main_banner_picture" class="form-control" onchange="readURL(this);">
                    <img class="hidden" id="tenant_photo_viewer" src="#" alt="your image" />
                    <style media="screen">
                    .hidden{
                        display: none;
                    }
                    </style>
                    <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(150);
                        };
                        $('#tenant_photo_viewer').removeClass('hidden');
                        reader.readAsDataURL(input.files[0]);
                        }
                    }
                    </script>
                </div>

                <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Submit</button>
            </form>
            </div>
            {{-- <div class="card-footer text-muted">
            2 days ago
            </div> --}}
        </div>

  </div>
</div>


@endsection


