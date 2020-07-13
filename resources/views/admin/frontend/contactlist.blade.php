@extends('layouts.admin')

@section('admin_content')

<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="index.html">Starlight</a>
  <a class="breadcrumb-item" href="index.html">Pages</a>
  <span class="breadcrumb-item active">Blank Page</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Contact list Page</h5>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-gray-200">
                    {{-- <h3 class="">Total Users : {{ $total_users }} </h3> --}}
                        <div class="card-body">
                            {{-- @if (session('status'))
                                <div role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif --}}
                            
                            <div class="table-responsive">
                                <table class="table table-hover mg-b-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">Serial No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Sendng Time</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($contact_details as $contactall)
                                            <tr>
                                                <td>{{ $contact_details->firstItem() + $loop->index  }}</td>
                                                <td>{{ Str::title($contactall->contact_name) }}</td>
                                                <td>{{ $contactall->contact_email }}</td>
                                                <td>{{ $contactall->contact_subject }}</td>
                                                <td>{{ $contactall->contact_message }}</td>
                                                <td>
                                                <li> Date: {{ $contactall->created_at->format('d:m:Y') }}</li>
                                                <li> Time: {{ $contactall->created_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                                                <li>{{ $contactall->created_at->diffForHumans() }}</li>
                                                </td>
                                                <td>
                                                @if($contactall->contact_attachment)
                                                    <a href="{{ asset('storage') }}/{{ $contactall->contact_attachment }}"><i class="fa fa-file"></i></a>   |
                                                    <a href="{{ url('contact/list/download') }}/{{ $contactall->id }}"><i class="fa fa-download"></i></a>
                                                @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                No data to show
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            {{ $contact_details->links() }}
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>

  </div>
</div>

@endsection  
