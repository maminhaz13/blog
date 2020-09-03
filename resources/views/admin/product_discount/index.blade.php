@extends('layouts.admin')

@section('product_active')
    active
@endsection

@section('admin_content')


  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
      <a class="breadcrumb-item active" href="{{ route('Product.discount') }}">Products discount</a>
      {{-- <span class="breadcrumb-item active">{{ $edit_data->category_name }}</span> --}}
    </nav>

    {{-- <div class="container">
      <div class="row"> --}}
        <div class="col-md-12">
          <div class="card mb-5 mt-5">
            <div class="card-header card-header-default">Product Table</div>
              <div class="card-body">
                <div>
                  
              @if(session('product_trashed'))
                <div class="alert alert-warning" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                <div class="d-flex align-items-center justify-content-start">
                  <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                  <span><strong>Warning!</strong> Better check yourself.</span>
                </div>
                </div>
              @endif
                </div>
                {{-- Added products table start --}}
                <form action="{{ url('product/delete/mark') }}" method="POST">
                @csrf
                  <div class="table-responsive mb-5 mt-5">
                    <table id="table" class="table table-hover mg-b-0">
                      <thead>
                        <tr>
                          <th scope="col">Mark <input type="checkbox" id="checkAll"></th>
                          <th scope="col">Serial No</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Product Short Description</th>
                          <th scope="col">Product Long Description</th>
                          <th scope="col">Product Quantity</th>
                          <th scope="col">Product Alert Quantity</th>
                          <th scope="col">Product Price</th>
                          <th scope="col">Product Picture</th>
                          <th scope="col">Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        @forelse($product_data as $prodata)
                          <tr>
                            <td>
                              <input class="ckbox mg-b-0" type="checkbox" name="product_data" value= "{{ $prodata->id }}" id="checkItem">
                            </td>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $prodata->product_name }}</td>
                            <td>{{ $prodata->relationship_with_category_for_catname->category_name }}</td>
                            <td>{{ $prodata->product_short_description }}</td>
                            <td>{{ $prodata->product_long_description }}</td>
                            <td>{{ $prodata->product_quantity }}</td>
                            <td>{{ $prodata->product_alert_quantity }}</td>
                            <td>{{ $prodata->product_price }}</td>
                            <td>
                              <img src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $prodata->product_thumbnail_picture }}" class="img-fluid" alt="image not found">
                            </td>
                            <td>
                              {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('Product.edit', $prodata->id) }}" type="button" class="btn btn-info active btn-btn-sm mg-b-10 btn btn sm">
                                  Edit
                                </a>
                                <form method="POST" action="{{ route('Product.destroy', $prodata->id) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger active btn-btn-sm mg-b-10 btn btn sm" >
                                    Trash
                                  </button>
                                </form> --}}

                                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a class="dropdown-item btn btn-danger active mg-b-5" href="{{ route('Product.discount.add', $prodata->id) }}">Add discount on product</a>
                                    <a class="dropdown-item btn btn-danger active mg-b-5" href="#">Edit discount of product</a>
                                    <a class="dropdown-item btn btn-danger active mg-b-5" href="#">Trash discount of product</a>
                                </div>

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
                    @if($prodata->count() > 0)
                      <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Mark Delete</button>
                    @endif
                  </div>
                </form>
                {{-- Added products table end --}}
              </div>
          </div>
        </div>

        {{-- Deleted products table start --}}
        <div class="col-md-12">
          <div class="card mb-5 mt-5">
            <div class="card-header card-header-default">Deleted Products Table</div>
              <div class="card-body">
                <div class="table-responsive mb-5 mt-5">
                  
                  <div>
                    @if(session('product_restore_success'))
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Well done!</strong> {{ session('product_restore_success') }}.</span>
                        </div>
                      </div>
                    @endif

                    @if(session('product_force_delete_success'))
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                          <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                          <span><strong>Well done!</strong> {{ session('product_force_delete_success') }}.</span>
                        </div>
                      </div>
                    @endif
                  </div>

                  <table id="tableOne" class="table table-hover mg-b-0">
                    <thead>
                      <tr>
                        <th scope="col">Mark <input type="checkbox" id="checkAll"></th>
                        <th scope="col">Serial No</th>
                        <th scope="col">Deleted Product Name</th>
                        <th scope="col">Deleted Category Name</th>
                        <th scope="col">Deleted Product Short Description</th>
                        <th scope="col">Deleted Product Long Description</th>
                        <th scope="col">Deleted Product Quantity</th>
                        <th scope="col">Deleted Product Alert Quantity</th>
                        <th scope="col">Deleted Product Price</th>
                        <th scope="col">Deleted Product Picture</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($deleted_product_data as $deletedprodata)
                        <tr>
                          <td>
                            <input class="ckbox mg-b-0" type="checkbox" name="" value= "" id="checkItem">
                          </td>
                          <td>{{ $loop->index+1 }}</td>
                          <td>{{ $deletedprodata->product_name }}</td>
                          <td>{{ $deletedprodata->relationship_with_category_for_catname->category_name }}</td>
                          <td>{{ $deletedprodata->product_short_description }}</td>
                          <td>{{ $deletedprodata->product_long_description }}</td>
                          <td>{{ $deletedprodata->product_quantity }}</td>
                          <td>{{ $deletedprodata->product_alert_quantity }}</td>
                          <td>{{ $deletedprodata->product_price }}</td>
                          <td>
                            <img src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $deletedprodata->product_thumbnail_picture }}" class="img-fluid" alt="image not found">
                          </td>
                          <td>
                            <a href="{{ url('product/restore', $deletedprodata->id) }}" name="product_id" type="button" class="btn btn-info active btn-btn-sm mg-b-10 btn btn sm">
                              Restore
                            </a>
                            <a href="{{ url('product/foreverdelete', $deletedprodata->id) }}" name="product_id" class="btn btn-danger active btn-btn-sm mg-b-10 btn btn sm" >
                              Forever Delete
                            </a>
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
          </div>
        </div>
        {{-- Deleted products table end --}}

      {{-- </div>
    </div> --}}
  </div>

  @endsection

  @section('footer_scripts')
  <script>
  $("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
  </script>

  <script>
      $(document).ready( function () {
          $('#table').DataTable();
      } );
  </script>

  <script>
      $(document).ready( function () {
          $('#tableOne').DataTable();
      });
  </script>

  @endsection
