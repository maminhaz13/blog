@extends('layouts.admin')

@section('frontend_active')
    active
@endsection

@section('admin_content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
    <a class="breadcrumb-item active" href="">About Us</a>
    {{-- <span class="breadcrumb-item active">Blank Page</span> --}}
  </nav>

    <div class="sl-pagebody">
      
        @if(session()->has('contact_added'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('contact_added') }}</strong>.</span>
            </div>
          </div>
        @endif

        @if(session()->has('contact_edit_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('contact_edit_done') }}</strong>.</span>
            </div>
          </div>
        @endif

        @if(session()->has('contact_infos_recover_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('contact_infos_recover_done') }}</strong>.</span>
            </div>
          </div>
        @endif

        @if(session()->has('contact_shown_done'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" a-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('contact_shown_done') }}</strong>.</span>
            </div>
          </div>
        @endif

        @if(session()->has('contact_trash_done'))
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('contact_trash_done') }}</strong>.</span>
            </div>
          </div>
        @endif

        @if(session()->has('contact_unshown_done'))
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ session()->get('contact_unshown_done') }}</strong>.</span>
            </div>
          </div>
        @endif

        @if(session()->has('contact_info_delete_done'))
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-close alert-icon tx-24"></i>
              <span><strong>{{ session()->get('contact_info_delete_done') }}</strong></span>
            </div>
          </div>
        @endif

        @error('email')
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ $message }}</strong>.</span>
            </div>
          </div>
        @enderror

        @error('address')
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ $message }}</strong>.</span>
            </div>
          </div>
        @enderror

        @error('phone')
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ $message }}</strong>.</span>
            </div>
          </div>
        @enderror

        @error('telephone')
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><strong>{{ $message }}</strong>.</span>
            </div>
          </div>
        @enderror

        <div class="card bg-gray-200 mt-5">
          <div class="card-header card-header-default">
            Added Contact Information here
          </div>
          <div class="card-body">

              <div class="table-responsive">
                <table id="tableOne" class="table table-hover mg-b-0">
                  <thead>
                    <tr>
                      <th scope="col">Serial No</th>
                      <th scope="col">email</th>
                      <th scope="col">Telephone</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Address</th>
                      <th scope="col">Added At</th>
                      <th scope="col">Show Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($contact_info as $contact)
                      <tr>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->telephone }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>
                          @isset($contact->created_at)
                            <li>Date : {{ $contact->created_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $contact->created_at->diffForHumans() }}</li>
                          @endisset
                        </td>
                        <td>
                          @if($contact->show_status==1)
                            <span class="badge badge-pill badge-info">Not Shown</span>
                          @else
                            <span class="badge badge-pill badge-success">Shown</span>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            @if($contact->show_status == 1)
                              <a href="{{ route('custom.contact.activate', $contact->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">Show</a>
                            @else
                              <a href="{{ route('custom.contact.deactivate', $contact->id) }}" type="button" class="btn btn-info btn-btn-sm mg-b-10 btn btn sm">Hide</a>
                            @endif
                            <a href="{{ route('custom.contact.edit', $contact->id) }}" type="button" class="btn btn-secondary btn-btn-sm mg-b-10" >Edit</a>
                            <a href="{{ route('custom.contact.trash', $contact->id) }}" type="submit" class="btn btn-warning btn-btn-sm mg-b-10" >Trash</a>
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
        </div>

        <div class="card text-center mt-5 mb-3">
          <div class="card-header">
            Add your companies contact information
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('custom.contact.add') }}">
              @csrf

              <div class="col-md-12 form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="" name="address">
              </div>

              <div class="col-md-12 form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="" name="email">
              </div>

              <div class="col-md-12 form-group">
                <label>Telephone</label>
                <input type="number" class="form-control" id="" name="telephone">
              </div>

              <div class="col-md-12 form-group">
                <label>Phone Number</label>
                <input type="number" class="form-control" id="" name="phone">
              </div>

              <button type="submit" class="btn btn-dark active mg-b-10 btn-btn-sm">Submit</button>
            </form>
          </div>
        </div>

        <div class="card bg-gray-200 mt-5">
          <div class="card-header card-header-default">
            Trash contacts' table
          </div>
          <div class="card-body">

              <div class="table-responsive">
                <table id="tabletwo" class="table table-hover mg-b-0">
                  <thead>
                    <tr>
                      <th scope="col">Serial No</th>
                      <th scope="col">email</th>
                      <th scope="col">Telephone</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Address</th>
                      <th scope="col">Added At</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($contact_trash as $contact_t)
                      <tr>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $contact_t->email }}</td>
                        <td>{{ $contact_t->telephone }}</td>
                        <td>{{ $contact_t->phone }}</td>
                        <td>{{ $contact_t->address }}</td>
                        <td>
                          @isset($contact_t->created_at)
                            <li>Date : {{ $contact_t->created_at->format('d:m:Y') }}</li>
                            <li>Duration : {{ $contact_t->created_at->diffForHumans() }}</li>
                          @endisset
                        </td>
                        <td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('custom.contact.restore', $contact_t->id) }}" type="button" class="btn btn-success btn-btn-sm mg-b-10 btn btn sm">
                              Restore
                            </a>
                            <a href="{{ route('custom.contact.delete', $contact_t->id) }}" type="button" class="btn btn-danger btn-btn-sm mg-b-10" >Delete</a>
                          </div>
                        </td>
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


@endsection

