<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminVerify;

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


Auth::routes(['verify' => true]); /* verify funciona para la verificacion del email al momento de registrarse */

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
/* ->middleware('verified', AdminVerify::class) middleware para bloquear las rutas si no esta logueado */

Route::resource('users', 'Admin\UserController');
/* Con resource puedo crear las 7 rutas rest en una sola línea */
/* AdminVerify para que la persona que este logueada y no sea admin lo saque de la tabla user */
Route::resource('products', 'Admin\ProductController');

Route::resource('products.Cart', 'Admin\ProductCartController')->only(['store', 'destroy']);


Route::patch('/change_state/{product}', 'Admin\ProductController@state')->name('state');

Route::resource('home', 'Users\HomeController');

// Route::get('/user', 'Admin\UserController@index')
//     ->name('User')
//     ->middleware('verified', AdminVerify::class);

// Route::get('/editar/{usuarId}', 'Admin\UserController@editar')
//     ->name('editar')->middleware('verified', AdminVerify::class);

// Route::patch('/actualizar/{usuario}', 'Admin\UserController@actualizar')
//     ->name('actualizar')
//     ->middleware('verified', AdminVerify::class);

// Route::delete('/delete/{usuarId}', 'Admin\UserController@destroy')
//     ->name('destroy')
//     ->middleware('verified', AdminVerify::class);
