<?php

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
    ->only(['index'])->middleware('verified');

Route::resource('orders', 'OrderController')
    ->only(['create', 'store'])->middleware('verified');

Route::resource('orders.payments', 'OrderPaymentController')
    ->only(['create', 'store'])->middleware('verified');

Route::resource('home', 'Users\HomeController');
