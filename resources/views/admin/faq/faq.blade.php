@extends('layouts.admin')

@section('faq_active')
    active
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
    <a class="breadcrumb-item active" href="">Products faq</a>
    {{-- <span class="breadcrumb-item active">Blank Page</span> --}}
  </nav>

    <div class="sl-pagebody">
      
        {{-- @if(session()->has('about_added'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('about_added') }}</strong>.</span>
            </div>
          </div>
        @endif --}}

        {{-- @if(session()->has('about_shown_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('about_shown_done') }}</strong>.</span>
            </div>
          </div>
        @endif --}}

        {{-- @if(session()->has('about_recover_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('about_recover_done') }}</strong>.</span>
            </div>
          </div>
        @endif --}}

        {{-- @if(session()->has('about_edit_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('about_edit_done') }}</strong>.</span>
            </div>
          </div>
        @endif --}}

        {{-- @if(session()->has('about_trash_done'))
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('about_trash_done') }}</strong>.</span>
            </div>
          </div>
        @endif --}}

        {{-- @if(session()->has('about_unshown_done'))
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('about_unshown_done') }}</strong>.</span>
            </div>
          </div>
        @endif --}}

        {{-- @if(session()->has('about_info_delete_done'))
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-close alert-icon tx-24"></i>
              <span><strong>{{ session()->get('about_info_delete_done') }}</strong></span>
            </div>
          </div>
        @endif --}}

        {{-- @error('story')
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ $message }}</strong>.</span>
            </div>
          </div>
        @enderror --}}

        {{-- <div class="card bg-gray-200 mt-5">
          <div class="card-header card-header-default">
            Added Banners' here
          </div>
          <div class="card-body">

              <div class="table-responsive">
                <table id="tableOne" class="table table-hover mg-b-0">
                  <thead>
                    <tr>
                      <th scope="col">Serial No</th>
                      <th scope="col">Our Story</th>
                      <th scope="col">Added At</th>
                      <th scope="col">Show Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($about_info as $about)
                      <tr>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $about->story }}</td>
                        <td>
                          @isset($about->created_at)
                            <li>Date : {{ $about->created_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $about->created_at->diffForHumans() }}</li>
                          @endisset
                        </td>
                        <td>
                          @if($about->show_story==1)
                            <span class="badge badge-pill badge-info">Not Shown</span>
                          @else
                            <span class="badge badge-pill badge-success">Shown</span>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            @if($about->show_story == 1)
                              <a href="{{ route('about.activate', $about->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">Show</a>
                            @else
                              <a href="{{ route('about.deactivate', $about->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">Hide</a>
                            @endif
                            <a href="{{ route('about.edit', $about->id) }}" type="button" class="btn btn-secondary btn-btn-sm mg-b-10" >Edit</a>
                            <form action="{{ route('about.destroy', $about->id) }}" method="POST">
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
          </div>
        </div> --}}

        <div class="card text-center mt-5 mb-3">
          <div class="card-header">
            Add a products faq
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Product list</label>
                    <select class="custom-select" name="product_id" id="">
                        <option selected>Select one product</option>
                        <option value="">s;lkfjl</option>
                    </select>
                </div>

              <div class="col-md-12 form-group">
                <label>Our Story</label>
                <input type="text" class="form-control" id="" name="story">
              </div>

              <div class="col-md-12 form-group">
                <label>Our Story</label>
                <input type="text" class="form-control" id="" name="story">
              </div>

              <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Submit</button>
            </form>
          </div>
        </div>

        {{-- <div class="card bg-gray-200 mt-5">
          <div class="card-header card-header-default">
            Trash abouts' table
          </div>
          <div class="card-body">

              <div class="table-responsive">
                <table id="tabletwo" class="table table-hover mg-b-0">
                  <thead>
                    <tr>
                      <th scope="col">Serial No</th>
                      <th scope="col">Our Story</th>
                      <th scope="col">Added At</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($about_trash as $about_t)
                      <tr>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $about_t->story }}</td>
                        <td>
                          @isset($about_t->created_at)
                            <li>Date : {{ $about_t->created_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $about_t->created_at->diffForHumans() }}</li>
                          @endisset
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('about.restore', $about_t->id) }}" type="button" class="btn btn-success btn-btn-sm mg-b-10 btn btn sm">
                              Restore
                            </a>
                            <a href="{{ route('about.delete', $about_t->id) }}" type="button" class="btn btn-danger btn-btn-sm mg-b-10" >Delete</a>
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
            </form>     
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

