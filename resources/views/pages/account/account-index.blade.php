@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="left-sidebar">
                    <h2>Your Profile</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Edit Profile</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Check Orders</a></h4>
                            </div>
                        </div>
                    </div><!--/category-products-->
                </div>
            </div>
            <div class="col-md-9">
                <div class="shopper-info">
                    <p>Update Your Information</p>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{route('account.store')}}" style="margin-bottom: 20px;" method="POST">
                        @csrf
                        <input type="text" placeholder="User Name" disabled value="{{Auth::user()->name}}">
                        <small>Username is unchangeable</small>
                        <input type="text" placeholder="First Name" name="first_name"
                               value="{{Auth::user()->first_name}}">
                        <input type="text" placeholder="Last Name" name="last_name" value="{{Auth::user()->last_name}}">
                        <input type="text" placeholder="Address" name="address" value="{{Auth::user()->address}}">
                        <input type="text" placeholder="City" name="city" value="{{Auth::user()->city}}">
                        <input type="text" placeholder="Postal Code" name="postalcode"
                               value="{{Auth::user()->postalcode}}">
                        <input type="text" placeholder="Country" name="country" value="{{Auth::user()->country}}">
                        <input type="text" placeholder="Phone" name="phone" value="{{Auth::user()->phone}}">
                        <input type="text" placeholder="Email" name="email" value="{{Auth::user()->email}}">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
