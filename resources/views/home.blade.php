@extends('layouts.admin')


@section('home_active')
    active    
@endsection

@section('title')
    Home    
@endsection


@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
        <span class="breadcrumb-item active">Home</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Home Page</h5>
        </div>
        
        @if(Auth::user()->role == 1)
            You are admin..
        @else
            YOu are customer..
        @endif


@endsection  
