@extends('layouts.app')

@section('content')
<div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="margin-top:-25px; background-image: url({{ asset('assets/img/bg-header.jpg') }});">
                <div class="container">
                    <h1 class="pt-5">
                        Categories
                    </h1>
                    <p class="lead">
                        Edit Categories
                    </p>
                </div>
            </div>
        </div>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
              <form method="POST" action="{{ route('sellars.update',$category->id) }}" enctype="multipart/form-data">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="{{ $category->name }}" name="name" id="form2Example1" class="form-control" placeholder="name" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text"  value="{{ $category->icon }}" name="icon" id="form2Example1" class="form-control" placeholder="icon" />      
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

      @endsection