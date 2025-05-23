@extends('layouts.app')

@section('content')
<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="margin-top:-25px; background-image: url({{ asset('assets/img/bg-header.jpg') }});">
                <div class="container">
                    <h1 class="pt-5">
                        Settings
                    </h1>
                    <p class="lead">
                        Update Your Account Info
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

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6">
                        <h5 class="mb-3">ACCOUNT DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <form action="{{ route('users.settings.update',$user->id) }}" method="post" class="bill-detail">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" name="name" value="{{ $user->name }}" placeholder="Full Name" type="text">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group">
                                    <textarea class="form-control"  name="address"  placeholder="Address">{{ $user->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="town" value="{{ $user->town }}" placeholder="Town / City" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="state" value="{{ $user->state }}" placeholder="State / Country" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="zip_code" value="{{ $user->zip_code }}" placeholder="Postcode / Zip" type="text">
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control"  name="email" value="{{ $user->email }}" placeholder="Email Address" type="email">
                                    </div>
                                    <div class="col">
                                        <input class="form-control"  name="phone_number" value="{{ $user->phone_number }}" placeholder="Phone Number" type="tel">
                                    </div>
                                </div><br>
                                <!-- <div class="form-group">
                                    <input class="form-control" placeholder="Password" type="password">
                                </div> -->
                                @if (Auth::user()->role == 'sellar')
                                <h5 class="mb-3">SHOP DETAILS</h5>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" name="shopname" value="{{ $user->shopname }}" placeholder="Shop Name" type="text">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group">
                                    <textarea class="form-control"  name="BankAccountName"  placeholder="Bank Account Name">{{ $user->BankAccountName }}</textarea>
                                </div>

                                <div class="form-group">
                                    <input class="form-control"  name="accnum" value="{{ $user->accnum }}" placeholder="Account Number" type="text">
                                </div>

                                <div class="form-group">
                                    <input class="form-control"  name="bankname" value="{{ $user->bankname }}" placeholder="Bank Name" type="text">
                                </div>

                                <div class="form-group">
                                    <input class="form-control"  name="branch" value="{{ $user->branch }}" placeholder="Branch Name" type="text">
                                </div>

                                @endif
                                <div class="form-group text-right">
                                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                                    <div class="clearfix">
                                </div>
                            </fieldset>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection