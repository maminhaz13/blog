@extends('layouts.admin')


@section('title')
    Edit Profile    
@endsection


@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
  <span class="breadcrumb-item active">Edit Profile</span>
  </nav>

  <div class="sl-pagebody">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="card mt-5">
              <div class="card-header card-header-default">Your Profile Name</div>       
                <div class="card-body">
                  <div class="card-title">You can change your name here.. You can change your name after 30 days.</div>
                  {{-- //Name changing errors and success message start --}}
                    @if(session()->has('name_change_success'))
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Well done!</strong> {{ session()->get('name_change_success') }}</span>
                        </div>
                      </div>
                    @endif

                    @if(session()->has('error_name_time_period'))
                      <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Heads up!</strong> {{ session()->get('error_name_time_period') }}.</span>
                        </div>
                      </div>
                    @endif
                    {{-- //Name changing errors and success message end --}}
                    {{-- //Name changing form start --}}
                    <form method="post" action="{{ route('editprofile') }}">
                    @csrf
                      <div class="form-group">
                        <label >Profile Name</label>
                          <input type="text" class="form-control" name="profile_name" placeholder="Enter Your Profile Name" value="{{ Auth::user()->name }}">

                          @error('parbana_status')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror  

                      </div>
                        <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10">Change Name</button>
                    </form>
                    {{-- //Name changing form start --}}
                </div>
            </div>

            <div class="card bg-gray-200 mt-5">
              <div class="card-header card-header-default">Your Profile Picture</div>
                <div class="card-body">

                  {{-- //Name changing errors and success message start --}}
                    @if(session()->has('pro_picture_change_done'))
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Well done!</strong> {{ session()->get('pro_picture_change_done') }}</span>
                        </div>
                      </div>
                    @endif

                    @if(session()->has('error_pro_picture_change_unselected'))
                      <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Heads up!</strong> {{ session()->get('error_pro_picture_change_unselected') }}.</span>
                        </div>
                      </div>
                    @endif
                    {{-- //Name changing errors and success message start --}}

                  {{-- Profile picture changing form start --}}
                  <form method="post" action="{{ route('changepropicture') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label >Profile Picture</label>
                        <input type="file" name="profile_picture" class="form-control" onchange="readURL(this);">
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
                      <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Change Picture</button>
                  </form>
                  {{-- Profile picture changing form End --}}
                </div>
            </div>

            <div class="card mt-5">
              <div class="card-header card-header-default">Your Password</div>
                <div class="card-body">
                  <div class="card-title">You can change your password here.. You can not use your previous password.</div>

                    @error('password')
                        @if($errors->all())
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                              <i class="icon ion-ios-close alert-icon tx-24"></i>
                              <span><strong>Oh snap!</strong> {{ $message }}.</span>
                            </div>
                          </div>
                        @endif
                    @enderror        

                    @if(session()->has('password_change_success'))
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Well done!</strong> {{ session()->get('password_change_success') }}</span>
                        </div>
                      </div>
                    @endif

                    @if(session()->has('error_reenter_old'))
                      <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Heads up!</strong> {{ session()->get('error_reenter_old') }}.</span>
                        </div>
                      </div>
                    @endif

                    @if(session()->has('error_password_hash_unmatched'))
                      <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Heads up!</strong> {{ session()->get('error_password_hash_unmatched') }}.</span>
                        </div>
                      </div>
                    @endif

                    <form method="post" action="{{ route('editpassword') }}">
                    @csrf
                      <div class="form-group">
                      <label >Old Password</label>
                        <input type="password" class="form-control" name="old_password" placeholder="Enter Your Old Password" >
                      </div>

                      <div class="form-group">
                      <label >New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your New Password">
                        {{-- @error('profile_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror   --}}
                      </div>

                      <div class="form-group">
                      <label >Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Your New Password To Confirm">
                        {{-- @error('profile_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror   --}}
                      </div>

                    <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Change Password</button>
                  </form>
                </div>
            </div>

          </div>
        </div>  
      </div>
  </div>  
</div>

@endsection  
