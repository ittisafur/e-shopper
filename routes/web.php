<?php

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
 * Category Routes
 * */
Route::get('/category/{slug}', 'CategoryController@index')->name('category.index');

/*
 * Cart Routes
 * */
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
//Route::get('/cartremove', function(){
//    Cart::destroy();
//});
//Route::get('/wishlistremove', function(){
//   Cart::instance('wishlist')->destroy();
//});
Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
Route::post('/wishlist', 'WishlistController@store')->name('wishlist.store');
Route::delete('/wishlist/{rowId}', 'WishlistController@destroy')->name('wishlist.destroy');
Route::post('/wishlist/{rowId}', 'WishlistController@switchToCart')->name('wishlist.switchtocart');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.payment');
Route::get('/account/{username}', 'AccountController@index')->name('account.index')->middleware('auth');
Route::post('/account', 'AccountController@store')->name('account.store')->middleware('auth');



Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@store')->name('contact.store');
Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/{any}', 'HomeController@notFound');
