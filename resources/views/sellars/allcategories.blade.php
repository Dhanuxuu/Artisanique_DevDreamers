
@extends('layouts.app')

@section('content')
<div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="margin-top:-25px; background-image: url({{ asset('assets/img/bg-header.jpg') }});">
                <div class="container">
                    <h1 class="pt-5">
                        Categories
                    </h1>
                    <p class="lead">
                        Update Categories
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            @if (\Session::has('update'))
            <div class="alert alert-success">
                    <p>{!! \Session::get('update') !!}</p>
            </div>        
            @endif
        </div>

        <div class="container mt-5">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
            </div>        
            @endif
        </div>

        <div class="container mt-5">
            @if (\Session::has('delete'))
            <div class="alert alert-success">
                    <p>{!! \Session::get('delete') !!}</p>
            </div>        
            @endif
        </div>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="{{route('sellars.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($allCategories as $allCategory)
                    <tr>
                    <th scope="row">{{ $allCategory->id }}</th>
                    <td>{{$allCategory->name}}</td>
                    <td><a  href="{{ route('sellars.edit',$allCategory->id) }}" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="{{ route('sellars.delete',$allCategory->id) }}" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                    @endforeach
                  
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection