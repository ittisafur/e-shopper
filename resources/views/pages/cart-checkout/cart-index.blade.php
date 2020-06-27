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
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Product Image</td>
                        <td class="description">Product Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Calculations</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{route('shop.show', $item->model->slug)}}"><img class="cart-image" src="images/shop/product{{rand(1,12)}}.jpg" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></h4>
                                <p>SKU ID: {{$item->model->sku}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$item->model->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="1"
                                           autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_price">
                                <p>${{$item->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                                <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="cart_quantity_delete" href=""><i
                                            class="fa fa-times"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="cart_product">
                        </td>
                        <td class="cart_description">
                        </td>
                        <td class="cart_price">
                        </td>
                        <td class="cart_quantity">
                            <h4>Subtotal</h4>
                        </td>
                        <td class="cart_price">
                            <p>${{Cart::subtotal()}}</p>
                        </td>
                        <td class="cart_delete">
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product">
                        </td>
                        <td class="cart_description">
                        </td>
                        <td class="cart_price">
                        </td>
                        <td class="cart_quantity">
                            <h4>Tax</h4>
                        </td>
                        <td class="cart_price">
                            <p>${{Cart::tax()}}</p>
                        </td>
                        <td class="cart_delete">
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product">
                        </td>
                        <td class="cart_description">
                        </td>
                        <td class="cart_price">
                        </td>
                        <td class="cart_quantity">
                            <h4>Total</h4>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{Cart::total()}}</p>
                        </td>
                        <td class="cart_delete">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    @foreach(countries() as $countries)
                                        <option>{{$countries['native_name']}}</option>
                                    @endforeach
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>$61</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
