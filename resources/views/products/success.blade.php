@extends('layouts.app')

@section('content')
<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="margin-top:-25px; background-image: url({{ asset('assets/img/bg-header.jpg') }});">
                <div class="container">
                    <h1 class="pt-5">
                        You paid for the products successfully.
                    </h1>
                    <a class="btn btn-primary" href="{{route('home')}}">
                        Go home.
                    </a>
                </div>
            </div>
        </div>

@endsection