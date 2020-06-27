<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
/*
 * Shop Routes
 * */
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{productSlug}', 'ShopController@show')->name('shop.show');
/*
 * Cart Routes
 * */
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::get('/cartremove', function(){
    Cart::destroy();
});

Route::get('/{any}', 'HomeController@notFound');

