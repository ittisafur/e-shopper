@extends('layouts.master')

@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt=""/>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('components.category')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <a href="{{route('shop.show', $product->slug)}}">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('images/shop/product'.rand(1,12).'.jpg')}}" alt=""/>
                                                <h2>${{$product->price}}</h2>
                                                <p>{{$product->name}}</p>
                                                <form action="{{route('cart.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input type="hidden" name="name" value="{{$product->name}}">
                                                    <input type="hidden" name="price" value="{{$product->price}}">
                                                    <button type="submit" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </form>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <form action="{{route('wishlist.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input type="hidden" name="name" value="{{$product->name}}">
                                                    <input type="hidden" name="details" value="{{$product->details}}">
                                                    <input type="hidden" name="price" value="{{$product->price}}">
                                                    <button type="submit"><i class="fa fa-plus-square"></i>Add to wishlist</button>
                                                </form>
                                            </li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{$products->links()}}
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
