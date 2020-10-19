@extends('layouts.admin')

@section('product_active')
    active
@endsection

@section('admin_content')


  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
      <a class="breadcrumb-item active" href="{{ route('product.discount') }}">Products discount</a>
      {{-- <span class="breadcrumb-item active">{{ $edit_data->category_name }}</span> --}}
    </nav>

    {{-- <div class="container">
      <div class="row"> --}}
        <div class="col-md-12">
          <div class="card mb-5 mt-5">
            <div class="card-header card-header-default">Product Table</div>
              <div class="card-body">
                <div>
                  @if (session('discount_added'))
                    <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                        <span><strong>Well done!</strong> {{ session('discount_added') }}.</span>
                      </div>
                    </div>
                  @endif

                  @if (session('discount_updated'))
                    <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                        <span><strong> {{ session('discount_updated') }}. </strong></span>
                      </div>
                    </div>
                  @endif

                  @error('discount_removed')
                    <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-24"></i>
                        <span><strong> {{ $message }}.</strong></span>
                      </div>
                    </div>
                  @enderror
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
                          <th scope="col">Product discount</th>
                          <th scope="col">Product discount amount</th>
                          <th scope="col">Product Price</th>
                          <th scope="col">Product discount visibility</th>
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
                            <td> 
                              @if($prodata->product_discount == 0)
                                <span class="badge badge-pill badge-info">Product discount not added</span>
                              @else
                                {{ $prodata->product_discount }}
                              @endif
                            </td>
                            <td> 
                              @if($prodata->product_discount_amount == 0)
                                <span class="badge badge-pill badge-info">Product discount amount not added</span>
                              @else
                                {{ $prodata->product_discount_amount }}
                              @endif
                            </td>
                            <td>{{ $prodata->product_price }}</td>
                            <td>
                              @if($prodata->show_discount == 1)
                                  <span class="badge badge-pill badge-info">Discount unavailable</span>
                              @elseif($prodata->show_discount == 2)
                                  <span class="badge badge-pill badge-warning">Discount not shown</span>
                              @elseif($prodata->show_discount == 3)
                                  <span class="badge badge-pill badge-success">Discount shown</span>
                              @endif
                            </td>
                            <td>
                              <img src="{{ asset('uploads') }}/product_thumbnail_picture/{{ $prodata->product_thumbnail_picture }}" height="150" width="150"  alt="image not found">
                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <button type="button" class="btn btn-indigo active mg-b-10 btn btn-sm show-alert" id="discount_id" value="{{ $prodata->id }}" onclick="selectid(val)" data-toggle="modal" data-target="#exampleModalCenter">Add Discount</button> --}}
                                <a type="button" class="btn btn-indigo mg-b-10 btn btn-sm show-alert" href=# id="discount_id" value="{{ $prodata->id }}">Add Discount</a>
                                <a href="{{ route('product.discount.edit', $prodata->id) }}" type="button" class="btn btn-inverse active mg-b-10 btn btn-sm">
                                  Edit
                                </a>
                                <a href="{{ route('product.discount.remove', $prodata->id) }}" type="button" class="btn btn-inverse active mg-b-10 btn btn-sm">
                                  remove
                                </a>
                                {{-- <form method="POST" action="{{ route('Product.destroy', $prodata->id) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger active btn-btn-sm mg-b-10 btn btn sm" >
                                    Trash
                                  </button>
                                </form> --}}
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
                      <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Add Discount to selected products</button>
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

    {{-- <!-- Modal start-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title tx-15 tx-bold tx-orange" id="exampleModalLongTitle">Add Product Discount</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('product.discount.add') }}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
                <label for="">Product list</label>
                <select id="one" class="js-example-basic-single custom-select tx-15 tx-bold tx-indigo" name="product_id">
                    <option selected="">Select one product</option>
                    @foreach($product_data as $product)
                      <option {{ $product->id == $product->id ? "selected":"" }} value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 form-group tx-15 tx-bold tx-indigo">
              <label>Product Discount Parcent</label>
              <input type="text" class="form-control" id="" name="product_discount">
            </div>

            <div class="col-md-12 form-group tx-15 tx-bold tx-indigo">
              <label>Product Discount Amount</label>
              <input type="text" class="form-control" id="" name="product_discount_amount">
            </div>

            <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Add discount</button>
            <button type="button" class="btn btn-dark disabled mg-b-10 btn-btn-sm" data-dismiss="modal">Close</button>
          </form>
        </div>
        <div class="modal-footer">
          <p class="tx-15 tx-bold tx-indigo pos-relative">Note: </p>
          <ul class="tx-15 tx-bold tx-indigo">
            <li>
              1. You can add product discount or product discount amount indivedually.
            </li>
            <li>
              2. Product discount amount should be a parcentage.
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal end--> --}}

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

  <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script>

  {{-- <script type="text/javascript">
    function dosomething(val){
      var product_id = (val);
    }  

    var window=alert('add new discount');

    if (window) {
        // if they clicked "ok"
        window.open('http://example.com/popup-is18.html',
            '_blank'
        );
    }
  </script> --}}

  {{-- <script type="text/javascript">
    $("button").click(function() {
      var fired_button = $(this).val();
      alert(fired_button);
    });
  // function selectid(val){
  //   var product_id = (val);
  //   alert(product_id);
  //   }  
  // }
    // $(document).ready(function(){
    //   $('#discount_id')
    // })
  </script> --}}

  <script>
    $(document).on("click", ".show-alert", function(e) {
      bootbox.alert("Hello world!"
    });
</script>

  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
  </script>

  @endsection

