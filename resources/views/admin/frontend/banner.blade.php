@extends('layouts.admin')

@section('frontend_active')
  active
@endsection

@section('admin_content')


<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">{{ config('app.name') }}</a>
    <a class="breadcrumb-item active" href="">Banners</a>
    {{-- <span class="breadcrumb-item active">Blank Page</span> --}}
  </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Banner Info Page</h5>
      </div>


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

        @if(session()->has('main_banner_shown_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>Well done!</strong> {{ session()->get('main_banner_shown_done') }}.</span>
            </div>
          </div>
        @endif

        @if(session()->has('main_banner_restore_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>Well done!</strong> {{ session()->get('main_banner_restore_done') }}.</span>
            </div>
          </div>
        @endif

        @if(session()->has('main_banner_trash_done'))
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>Warning!</strong> {{ session()->get('main_banner_trash_done') }}.</span>
            </div>
          </div>
        @endif

        @if(session()->has('main_banner_unshown_done'))
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>Warning!</strong> {{ session()->get('main_banner_unshown_done') }}.</span>
            </div>
          </div>
        @endif

        @if(session()->has('main_banner_edit_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('main_banner_edit_done') }}.</strong></span>
            </div>
          </div>
        @endif

        @if(session()->has('main_banner_delete_done'))
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-close alert-icon tx-24"></i>
              <span><strong>{{ session()->get('main_banner_delete_done') }}</strong></span>
            </div>
          </div>
        @endif


        <div class="card bg-gray-200 mt-5">
          <div class="card-header card-header-default">
            Added Banners' here
          </div>
          <div class="card-body">

              {{-- <form method="post" action="{{ url('markdeletecategory') }}"> --}}
              @csrf
              <div class="table-responsive">
                <table id="tableOne" class="table table-hover mg-b-0">
                  <thead>
                    <tr>
                      <th scope="col">Mark <input type="checkbox" id="checkAll" ></th>
                      <th scope="col">Serial No</th>
                      <th scope="col">Banner title</th>
                      <th scope="col">Banner text</th>
                      <th scope="col">Banner Picture</th>
                      <th scope="col">Activation Status</th>
                      <th scope="col">Banner Added</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($banner_info as $banners)
                      <tr>
                        <td>
                          <input class="ckbox mg-b-0" type="checkbox" name="" value="" id="checkItem">
                        </td>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $banners->main_banner_title }}</td>
                        <td>{{ $banners->main_banner_short_description }}</td>
                        <td>
                          <img src="{{ asset('uploads') }}/main_banner_picture/{{ $banners->main_banner_picture }}" class="img-fluid" alt="image not found">
                        </td>
                        <td>
                          @if($banners->show_status==1)
                            <span class="badge badge-pill badge-success">Shown</span>
                          @else
                            <span class="badge badge-pill badge-info">Not Shown</span>
                          @endif
                        </td>
                        <td>
                          @isset($banners->updated_at)
                            <li>Date : {{ $banners->updated_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $banners->updated_at->diffForHumans() }}</li>
                          @endisset
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            @if($banners->show_status == 1)
                              <a href="{{ route('banner.deactivate', $banners->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">Hide</a>
                            @else
                              <a href="{{ route('banner.activate', $banners->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">Show</a>
                            @endif
                            <a href="{{ route('banner.edit', $banners->id) }}" type="button" class="btn btn-secondary btn-btn-sm mg-b-10" >Edit</a>
                            <form action="{{ route('banner.destroy', $banners->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button href="" type="submit" class="btn btn-warning btn-btn-sm mg-b-10" >Trash</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      @empty
                        <tr>
                          <td colspan="100" class="text-center text-danger"> No more data available </td>  
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              {{-- @if($categories->count() > 0)
                  <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Mark Delete</button>  
              @endif --}}
            {{-- </form>      --}}
          </div>
        </div>

        <div class="card text-center mt-5 mb-3">
          <div class="card-header">
            Banner addition form
          </div>
          <div class="card-body">
            <h5 class="card-title">Add Your Main Banner Here</h5>
            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
            <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
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

        <div class="card bg-gray-200 mt-5">
          <div class="card-header card-header-default">
            Trash banners' table
          </div>
          <div class="card-body">

              {{-- <form method="post" action="{{ url('markdeletecategory') }}"> --}}
              @csrf
              <div class="table-responsive">
                <table id="tabletwo" class="table table-hover mg-b-0">
                  <thead>
                    <tr>
                      <th scope="col">Mark <input type="checkbox" id="checkAll" ></th>
                      <th scope="col">Serial No</th>
                      <th scope="col">Banner title</th>
                      <th scope="col">Banner text</th>
                      <th scope="col">Banner Picture</th>
                      <th scope="col">Activation Status</th>
                      <th scope="col">Banner Added</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($banner_trash as $banner_trashh)
                      <tr>
                        <td>
                          <input class="ckbox mg-b-0" type="checkbox" name="" value="" id="checkItem">
                        </td>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $banner_trashh->main_banner_title }}</td>
                        <td>{{ $banner_trashh->main_banner_short_description }}</td>
                        <td>
                          <img src="{{ asset('uploads') }}/main_banner_picture/{{ $banner_trashh->main_banner_picture }}" class="img-fluid" alt="image not found">
                        </td>
                        <td>
                          @if($banner_trashh->show_status==2)
                            <span class="badge badge-pill badge-info">Not Shown</span>
                          @else
                            <span class="badge badge-pill badge-success">Shown</span>
                          @endif
                        </td>
                        <td>
                          @isset($banner_trashh->updated_at)
                            <li>Date : {{ $banner_trashh->updated_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $banner_trashh->updated_at->diffForHumans() }}</li>
                          @endisset
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('banner.restore', $banner_trashh->id) }}" type="button" class="btn btn-success btn-btn-sm mg-b-10 btn btn sm">
                              Restore
                            </a>
                            <a href="{{ route('banner.delete', $banner_trashh->id) }}" type="button" class="btn btn-danger btn-btn-sm mg-b-10" >Delete</a>
                          </div>
                        </td>
                      </tr>
                      @empty
                        <tr>
                          <td colspan="100" class="text-center text-danger"> No more data available </td>  
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              {{-- @if($categories->count() > 0)
                  <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Mark Delete</button>  
              @endif --}}
            {{-- </form>      --}}
          </div>
        </div>
</div>



@endsection

@section('footer_scripts')

  <script>
      $(document).ready( function () {
          $('#tableOne').DataTable();
      } );
  </script>

  <script>
      $(document).ready( function () {
          $('#tabletwo').DataTable();
      } );
  </script>

  @endsection
