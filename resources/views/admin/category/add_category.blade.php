@extends('layouts.admin')

@section('category_active')
  active
@endsection

@section('title')
    Category    
@endsection

   
@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
    <span class="breadcrumb-item active">Category</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Category Page</h5>
      <p>This is the page where you can add the category you want,delete the category or recover the category you deleted mistakenly..</p>
    </div>
    

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-gray-200 mt-5">
                    <div class="card-header card-header-default">Add Category Form</div>
                      <div class="card-body">      

                        @if(session()->has('done_status'))
                          <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                              <span><strong>Well done!</strong> {{ session()->get('done_status') }}.</span>
                            </div>
                          </div>
                        @endif

                        @if(session()->has('picture_up_done'))
                          <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                              <span><strong>Well done!</strong> {{ session()->get('picture_up_done') }}.</span>
                            </div>
                          </div>
                        @endif    
                        
                        @error('category_name')
                          <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                              <span><strong>Warning!</strong> {{ $message }}.</span>
                            </div><!-- d-flex -->
                          </div>
                        @enderror

                        @error('category_description')
                          <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                              <span><strong>Warning!</strong> {{ $message }}.</span>
                            </div><!-- d-flex -->
                          </div>
                        @enderror
                        <form method="post" action="{{ route('addcategorypost') }}" enctype="multipart/form-data">
                          @csrf
                          
                          <div class="form-group">
                            <label >Add Category</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name" value="{{ old('category_name') }}">
                            </div>
                          
                          <div class="form-group">
                            <label >Add Decription</label>
                            <input type="text" class="form-control" name="category_description" placeholder="Enter Category description" value='{{ old('category_description') }}'>
                          
                          <div class="form-group">
                            <label >Add Category Picture</label>
                            <input type="file" class="form-control" name="category_picture" value="">
                            {{-- @error('category_description')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror   --}}
                          </div>
                          
                          <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10">
                            <i class="fa fa-send mg-r-10">
                              Add Category
                            </i>
                          </button>
                        </form>
                      </div>
                </div>
              </div>
            </div>
          </div>



          <div class="card bg-gray-200 mt-5">
            <div class="card-header card-header-default">
              Active Category List
            </div>
            <div class="card-body">
            <div class="card-body-title">
              <h5>All of your activated category will be listed here..  You can edit this categories or delete these categories here..</h5>
            </div>

              @if(session()->has('delete_status'))
                <div class="alert alert-warning" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Warning!</strong> {{ session()->get('delete_status') }}.</span>
                  </div>
                </div>
              @endif

              @if(session()->has('mark_deleted'))
                <div class="alert alert-warning" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Warning!</strong> {{ session()->get('mark_deleted') }}.</span>
                  </div>
                </div>
              @endif

              @if(session()->has('mark_deleted_error'))
                <div class="alert alert-warning" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Warning!</strong> {{ session()->get('mark_deleted_error') }}.</span>
                  </div>
                </div>
              @endif

              @if(session()->has('edit_status'))
                <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done!</strong> {{ session()->get('edit_status') }}.</span>
                  </div>
                </div>
              @endif

                <form method="post" action="{{ route('markdeletecategory') }}">
                @csrf
                <div class="table-responsive">
                  <table class="table table-hover mg-b-0">
                    <thead>
                      <tr>
                        <th scope="col">Mark <input type="checkbox" id="checkAll" ></th>
                        <th scope="col">Serial No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Description</th>
                        <th scope="col">Category Picture</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">Updated Time</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($categories as $category)
                        <tr>
                          <td>
                            <input class="ckbox mg-b-0" type="checkbox" name="category_id[]" value="{{ $category->id }}" id="checkItem">
                          </td>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $category->category_name }}</td>
                          <td>{{ $category->category_description }}</td>
                          <td>
                            <img src="{{ asset('uploads') }}/category_picture/{{ $category->category_picture }}" class="img-fluid" alt="image not found">
                          </td>
                          <td>{{ App\User::find($category->user_id)->name }}</td>
                          <td>
                            <li>Time : {{ $category->created_at->format('h:i:s A') }}</li>
                            <li>Date : {{ $category->created_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $category->created_at->diffForHumans() }}</li>
                          </td>
                          <td>
                            @isset($category->updated_at)
                              <li>Time : {{ $category->updated_at->format('h:i:s A') }}</li>
                              <li>Date : {{ $category->updated_at->format('d:m:Y') }}</li>
                              <li>Duration : {{ $category->updated_at->diffForHumans() }}</li>
                            @endisset
                          </td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('category/edit') }}/{{ $category->id }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">
                                Edit
                              </a>
                              <a href="{{ url('category/delete') }}/{{ $category->id }}" type="button" class="btn btn-danger disable btn-btn-sm mg-b-10" >Trash</a>
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
          </div>



          <div class="card bg-gray-200 mt-5">
            <div class="card-header card-header-default">
                Deleted Category List
            </div>
            <div class="card-body">
              <div class="card-body-title">
                <h5>All of your deleted category will be listed here.. You can restore this categories or delete these categories here..</h5>
              </div>  
              
                @if(session()->has('restore_status'))
                  <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Well done!</strong> {{ session()->get('restore_status') }}.</span>
                    </div>
                  </div>              
                @endif     

                @if(session()->has('mark_restore'))
                  <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Well done!</strong> {{ session()->get('mark_restore') }}.</span>
                    </div>
                  </div>           
                @endif     

                @if(session()->has('mark_restore_error'))
                  <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Warning!</strong> {{ session()->get('mark_restore_error') }}.</span>
                    </div>
                  </div>
                @endif

                @if(session()->has('forever_delete'))
                  <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Warning!</strong> {{ session()->get('forever_delete') }}.</span>
                    </div>
                  </div>
                @endif

              <form action="{{ route('markrestorecategory') }}" method="post">
                @csrf
                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead>
                        <tr>
                          <th scope="col">Mark <input type="checkbox" id="checkAll"></th>
                          <th scope="col">Serial No</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Category Description</th>
                          <th scope="col">Created By</th>
                          <th scope="col">Deleted Time</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($deleted_data as $deleted_d)
                          <tr>
                            <td>
                              <input class="ckbox mg-b-0" type="checkbox" name="re_category_id[]" value= "{{ $deleted_d->id }}" id="checkItem"> 
                            </td>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $deleted_d->category_name }}</td>
                            <td>{{ $deleted_d->category_description }}</td>
                            <td>{{ App\User::find($deleted_d->user_id)->name }}</td>
                            <td>
                              @isset($deleted_d)
                                <li>Time : {{ $deleted_d->deleted_at->format('h:i:s A') }}</li>
                                <li>Date : {{ $deleted_d->deleted_at->format('d:m:Y') }}</li>
                                <li>Duration : {{ $deleted_d->deleted_at->diffForHumans() }}</li>
                              @endisset
                            </td>
                            <td>
                              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ url('category/restore') }}/{{ $deleted_d->id }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">Restore</a>
                                <a href="{{ url('category/harddelete') }}/{{ $deleted_d->id }}"" type="button" class="btn btn-danger disable btn-btn-sm mg-b-10">Delete Forever</a>
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
                  @if($deleted_data->count() > 0)
                    <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10">Mark Restore</button>                    
                  @endif
              </form>
            </div>
          </div>  
        </div>
      </div>  
    </div>
  </div>
</div>

@endsection  

@section('footer_scripts')
<script>
$("#checkAll").click(function () {
  $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection
