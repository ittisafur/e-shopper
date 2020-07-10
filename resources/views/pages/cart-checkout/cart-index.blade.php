@extends('layouts.master')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                @if(Cart::count() > 0)
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Product Image</td>
                            <td class="description">Product Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{route('shop.show', $item->model->slug)}}">
                                        <img class="cart-image" src="images/shop/product{{rand(1,12)}}.jpg" alt="">
                                    </a>
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
                                    <div class="cart_quantity_button" id="item">
                                        <a class="cart_quantity_up" id="add" href="#"> + </a>
                                        <input class="cart_quantity_input" type="text"
                                               name="quantity" value="1"
                                               autocomplete="off" size="2">
                                        <a class="cart_quantity_down" id="deduct" href="#"> - </a>
                                    </div>
                                </td>
                                <td class="cart_delete">
                                    <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart_quantity_delete" href=""><i
                                                class="fa fa-times"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <Cartitems items="{{{Cart::content()}}}"/>
                @else
                    <h4>You don't have anything in the cart. Start <a href="{{route('shop.index')}}">Shopping</a> ?</h4>
                @endif
            </div>
        </div>
    </section> <!--/#cart_items-->
    @if(Cart::count() > 0)
        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate
                        your
                        delivery cost.</p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>${{Cart::subtotal()}}</span></li>
                                <li>Eco Tax <span>${{Cart::tax()}}</span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>${{Cart::total()}}</span></li>
                            </ul>
                            {{--                        <a class="btn btn-default update" href="">Update</a>--}}
                            <form action="{{route('checkout.index')}}">
                                @csrf
                                <button type="submit" class="btn btn-default check_out">Check Out</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel"
                           data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel"
                           data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->
            </div>
        </section><!--/#do_action-->
    @endif
@endsection
@section('custom-js')
    <script>
        (function () {
            let items = document.querySelectorAll(".item");

            items.forEach(item => {
                let plusBtn = item.querySelector(".cart_quantity_up");
                let input = item.querySelector(".cart_quantity_input");
                let minusBtn = item.querySelector(".cart_quantity_down");

                plusBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    console.log('added')
                    return input.value++;
                });

                minusBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    if (input.value < 2) return;
                    input.value--;
                });
            });
        })();
    </script>
@endsection
