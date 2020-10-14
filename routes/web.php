<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);


Route::resource('products.carts', 'Cart\ProductCartController')
    ->only(['store', 'destroy'])->middleware('verified');

Route::resource('carts', 'Cart\CartController')
    ->only(['index','destroy'])->middleware('verified');

Route::resource('orders', 'OrderController')->middleware('verified');
Route::post('orders/{order}','OrderController@repeatPayment',)->name('orders.repeatPayment');

/* Route::resource('orders.payments', 'OrderPaymentController')
    ->only(['create', 'store', 'show'])->middleware('verified'); */
/* 
Route::resource('payments', 'Payments\PaymentController')->middleware('verified'); */

Route::get('home', 'Users\HomeController@index')->name('home.index');

Route::get('home/{product}', 'Users\HomeController@show')->name('home.show');
