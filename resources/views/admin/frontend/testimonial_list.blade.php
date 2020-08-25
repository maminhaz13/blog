@extends('layouts.admin')

{{-- @php
    error_reporting(0);
@endphp --}}

@section('testmonial_active')

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
        <h5>Testimonials From Users..</h5>
      </div>


        @if(session()->has('testi_shown'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('testi_shown') }}</strong>.</span>
            </div>
          </div>
        @endif

        @if(session()->has('testi_hidden'))
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('testi_hidden') }}</strong>.</span>
            </div>
          </div>
        @endif

        {{-- @if(session()->has('main_banner_delete_done'))
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-close alert-icon tx-24"></i>
              <span><strong>{{ session()->get('main_banner_delete_done') }}</strong></span>
            </div>
          </div>
        @endif --}}


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
                      <th scope="col">Reviewer Name</th>
                      <th scope="col">Reviewer email</th>
                      <th scope="col">Review</th>
                      <th scope="col">Showing Status</th>
                      <th scope="col">Review given at</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($testmonial_all as $testmonial)
                      <tr>
                        <td>
                          <input class="ckbox mg-b-0" type="checkbox" name="" value="" id="checkItem">
                        </td>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $testmonial->testmonial_user->name }}</td>
                        <td>{{ $testmonial->reviewer_email }}</td>
                        <td>{{ $testmonial->review_full }}</td>
                        {{-- <td>
                          <img src="{{ asset('uploads') }}/main_banner_picture/{{ $banners->main_banner_picture }}" class="img-fluid" alt="image not found">
                        </td> --}}
                        <td>
                          @if($testmonial->show_status==1)
                            <span class="badge badge-pill badge-info">Not Shown</span>
                          @else
                            <span class="badge badge-pill badge-success">Shown</span>
                          @endif
                        </td>
                        <td>
                          @isset($testmonial->created_at)
                            <li>Date : {{ $testmonial->created_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $testmonial->created_at->diffForHumans() }}</li>
                          @endisset
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            @if($testmonial->show_status == 1)
                              <a href="{{ route('testimonial.activate', $testmonial->id) }}" type="button" class="btn btn-dark btn-btn-sm mg-b-10 btn btn sm">Show</a>
                            @else
                              <a href="{{ route('testimonial.deactivate', $testmonial->id) }}" type="button" class="btn btn-warning btn-btn-sm mg-b-10 btn btn sm">Hide</a>
                            @endif
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

        {{-- <div class="card bg-gray-200 mt-5">
          <div class="card-header card-header-default">
            Trash banners' table
          </div>
          <div class="card-body">

              <form method="post" action="{{ url('markdeletecategory') }}">
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
              @if($categories->count() > 0)
                  <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Mark Delete</button>  
              @endif
          </div>
        </div> --}}
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

