@extends('layouts.admin')

@section('frontend_active')
  active
@endsection

@section('admin_content')


<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">{{ env('APP_NAME') }}</a>
    {{-- <a class="breadcrumb-item" href="index.html">Pages</a> --}}
    {{-- <span class="breadcrumb-item active">Blank Page</span> --}}
  </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Frontend Info Page</h5>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">

                @if(session()->has('main_banner_update_done'))
                  <div class="alert alert-success" role="alert">
                    <button type="button" class="close" a-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Well done!</strong> {{ session()->get('main_banner_update_done') }}.</span>
                    </div>
                  </div>
                @endif

            <div class="card text-center mt-5 mb-3">
              <div class="card-header">
                Banner Page
              </div>
              <div class="card-body">
                <h5 class="card-title">Add Your Main Banner Here</h5>
                {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                <form method="POST" action="{{ route('banner.mainbanner.post') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="col-md-12 form-group">
                    <label>Main Banner Title</label>
                    <input type="text" class="form-control" id="" name="main_banner_title">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Main Banner Text</label>
                    <input type="text" class="form-control" id="" name="main_banner_short_description">
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
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">

          @if(session()->has('discount_banner_update_done'))
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" a-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                <span><strong>Well done!</strong> {{ session()->get('discount_banner_update_done') }}.</span>
              </div>
            </div>
          @endif

          <div class="card text-center mt-5 mb-3">
            <div class="card-header">
              Discount Banner Page
            </div>
            <div class="card-body">
              <h5 class="card-title">Add Your Discount Banner Here</h5>
              {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
              <form method="POST" action="{{ route('frontend.discountbanner.post') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12 form-group">
                  <label>Discount Banner Title</label>
                  <input type="text" class="form-control" id="" name="discount_banner_title">
                </div>

                <div class="col-md-12 form-group">
                  <label>Discount Banner Percentage</label>
                  <input type="number" class="form-control" id="" name="discount_banner_percentage">
                </div>

                <div class="col-md-12 form-group">
                  <label>Discount Banner Text One</label>
                  <input type="text" class="form-control" id="" name="discount_banner_text_one">
                </div>

                <div class="col-md-12 form-group">
                  <label>Discount Banner Text two</label>
                  <input type="text" class="form-control" id="" name="discount_banner_text_two">
                </div>

                <div class="form-group">
                  <label >Discount Banner Picture</label>
                    <input type="file" name="discount_banner_picture" class="form-control" onchange="readURL(this);">
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
    </div>
</div>



@endsection

