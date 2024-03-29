//admin page main panel code
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

    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto">
          <h1>Hey Guys</h1>
          <p>I am minhaz..i am a web developer...!!</p>
        </div>
      </div>
    </div>

  </div>
</div>


//all alerts
    <h6 class="card-body-title">Alert With Icons</h6>
    <p class="mg-b-20 mg-sm-b-30">Using icons inside an alert box.</p>

    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
        <span><strong>Well done!</strong> Successful alert message.</span>
      </div>
    </div>

    <div class="alert alert-info" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
        <span><strong>Heads up!</strong> This alert needs your attention.</span>
      </div>
    </div>

    <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
        <span><strong>Warning!</strong> Better check yourself.</span>
      </div>
    </div>

    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-ios-close alert-icon tx-24"></i>
        <span><strong>Oh snap!</strong> Error alert message.</span>
      </div>
    </div>
  </div>      


//alert code with session
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


//complete table code with card
  <div class="card bg-gray-200 mt-5">
    <div class="card-header card-header-default">
      Table header here
    </div>
    <div class="card-body">
    <div class="card-body-title">
      <h5>table description here..</h5>
    </div>

      {{-- @if(session()->has('delete_status'))
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
      @endif --}}

        <form method="post" action="{{ url('markdeletecategory') }}">
        @csrf
        <div class="table-responsive">
          <table class="table table-hover mg-b-0">
            <thead>
              <tr>
                <th scope="col">Mark <input type="checkbox" id="checkAll" ></th>
                <th scope="col">Serial No</th>
                <th scope="col">Category Name</th>
              </tr>
            </thead>
            <tbody>
              {{-- @forelse($categories as $category) --}}
                <tr>
                  <td>
                    <input class="ckbox mg-b-0" type="checkbox" name="" value="" id="checkItem">
                  </td>
                  {{-- <td>{{ $loop->index +1 }}</td> --}}
                  <td></td>
                  {{-- <td>
                    <img src="{{ asset('uploads') }}/category_picture/{{ $category->category_picture }}" class="img-fluid" alt="image not found">
                  </td> --}}
                  {{-- <td>
                    @isset($category->updated_at)
                      <li>Time : {{ $category->updated_at->format('h:i:s A') }}</li>
                      <li>Date : {{ $category->updated_at->format('d:m:Y') }}</li>
                      <li>Duration : {{ $category->updated_at->diffForHumans() }}</li>
                    @endisset
                  </td> --}}
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ url('') }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">
                        Edit
                      </a>
                      <a href="{{ url('') }}" type="button" class="btn btn-danger disable btn-btn-sm mg-b-10" >Trash</a>
                    </div>
                  </td>
                </tr>
                {{-- @empty --}}
                  <tr>
                    <td colspan="100" class="text-center text-danger"> No more data available </td>  
                  </tr>
              {{-- @endforelse --}}
            </tbody>
          </table>
        </div>
        {{-- @if($categories->count() > 0)
            <button type="submit" class="btn btn-dark active btn-btn-sm mg-b-10"> Mark Delete</button>  
        @endif --}}
      {{-- </form>      --}}
    </div>
  </div>


//accordition Starlight
<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h6 class="mg-b-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition">
          Making a Beautiful CSS3 Button Set
        </a>
      </h6>
    </div><!-- card-header -->

    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block pd-20">
        A concisely coded CSS3 button set increases...
      </div>
    </div>
  </div><!-- card -->
  <!-- ADD MORE CARD HERE -->
</div><!-- accordion -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Base Accordion</h6>
          <p class="mg-b-20 mg-sm-b-30">The default collapse behavior to create an accordion.</p>

          <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
              <div class="card-header" role="tab" id="headingOne">
                <h6 class="mg-b-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition">
                    Making a Beautiful CSS3 Button Set
                  </a>
                </h6>
              </div><!-- card-header -->

              <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-body">
                  A concisely coded CSS3 button set increases usability across the board, gives you a ton of options, and keeps all the code involved to an absolute minimum. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab" id="headingTwo">
                <h6 class="mg-b-0">
                  <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Horizontal Navigation Menu Fold Animation
                  </a>
                </h6>
              </div>
              <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab" id="headingThree">
                <h6 class="mg-b-0">
                  <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Creating CSS3 Button with Rounded Corners
                  </a>
                </h6>
              </div>
              <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore.
                </div>
              </div><!-- collapse -->
            </div><!-- card -->
          </div><!-- accordion -->
        </div><!-- card -->


  {{-- select option with js select2 --}}
  <div class="col-lg-4 mg-t-20 mg-lg-t-0">
      <select class="form-control select2-show-search select2-hidden-accessible"
          data-placeholder="Choose one (with searchbox)" tabindex="-1" aria-hidden="true">
          <option label="Choose one"></option>
          <option value="Firefox">Firefox</option>
          <option value="Chrome">Chrome</option>
          <option value="Safari">Safari</option>
          <option value="Opera">Opera</option>
          <option value="Internet Explorer">Internet Explorer</option>
      </select>
      <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 386px;">
          <span class="selection">
              <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-p4d6-container">
                  <span class="select2-selection__rendered" id="select2-p4d6-container">
                      <span class="select2-selection__placeholder">
                          Choose one (with searchbox)
                      </span>
                  </span>
                  <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
              </span>
          </span>
          <span class="dropdown-wrapper" aria-hidden="true"></span>
      </span>
  </div>


  {{-- large modal --}}
  <div class="modal d-block pos-static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header pd-y-20 pd-x-25">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body pd-25">
          <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Why We Use Electoral College, Not Popular Vote</a></h4>
          <p class="mg-b-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info pd-x-20">Save changes</button>
          <button type="button" class="btn btn-secondary pd-x-20">Close</button>
        </div>
      </div>
    </div><!-- modal-dialog -->
  </div>

  {{-- large modal button --}}
  <div class="pd-y-30 tx-center bg-gray-700">
      <a href="" class="btn btn-info pd-x-20" data-toggle="modal" data-target="#modaldemo3">View Live Demo</a>
    </div>