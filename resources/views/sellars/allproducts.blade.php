@extends('layouts.app')

@section('content')
<div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="margin-top:-25px; background-image: url({{ asset('assets/img/bg-header.jpg') }});">
                <div class="container">
                    <h1 class="pt-5">
                        Products
                    </h1>
                    <p class="lead">
                        Manage Products
                    </p>
                </div>
            </div>
        </div>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
              <a  href="create-products.html" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">product</th>
                    <th scope="col">price in $$</th>
                    <th scope="col">expiration date</th>
                    <!-- <th scope="col">status</th> -->
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($allProducts as $product )
                    <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->exp_date}}</td>
                     <!-- <td><a href="#" class="btn btn-success  text-center ">verfied</a></td> -->
                     <td><a href="#" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                    @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection