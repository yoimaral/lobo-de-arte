<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('users', 'UserController')->middleware('verified');
/* Con resource puedo crear las 7 rutas rest en una sola línea */
/* AdminVerify para que la persona que este logueada y no sea admin lo saque de la tabla user */
Route::resource('products', 'ProductController')->middleware('verified');

Route::patch('/change_state/{product}', 'ProductController@state')
    ->name('state')->middleware('verified');

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
