@extends('layouts.master')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Wishlist Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                @if(Cart::instance('wishlist')->count() > 0)
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Product Image</td>
                            <td class="description">Product Name</td>
                            <td class="price">Price</td>
                            <td class="total">Add to cart</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::instance('wishlist')->content() as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{route('shop.show', $item->model->slug)}}"><img class="cart-image"
                                                                                              src="images/shop/product{{rand(1,12)}}.jpg"
                                                                                              alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a>
                                    </h4>
                                    <p>SKU ID: {{$item->model->sku}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>${{$item->model->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form action="{{route('wishlist.switchtocart', $item->rowId)}}" method="POST">
                                            @csrf
                                            <button type="submit">Add To Cart</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_price">
                                    <p>${{$item->subtotal}}</p>
                                </td>
                                <td class="cart_delete">
                                    <form action="{{route('wishlist.destroy', $item->rowId)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart_quantity_delete" href=""><i
                                                class="fa fa-times"></i></button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h4 style="text-align: center">You Don't have anything in the wishlist</h4>
                @endif
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
