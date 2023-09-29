<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'ShopController@index')->name('shop.index');
Route::get('/product/{id}', 'ShopController@show')->name('shop.product.show');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'CartController@add')->name('cart.add');
Route::post('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout/place-order', 'CheckoutController@placeOrder')->name('checkout.place-order');
