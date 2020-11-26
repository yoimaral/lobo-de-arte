<?php

use App\Http\Middleware\AdminVerify;
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

Route::resource('users', 'UserController')->middleware(['verified', AdminVerify::class]);
/* Con resource puedo crear las 7 rutas rest en una sola línea */
/* AdminVerify para que la persona que este logueada y no sea admin lo saque de la tabla user */

Route::get('/users_export','UserController@export')->name('users.export');
Route::post('/users_import','UserController@import')->name('users.import');

Route::get('/user_token','UserController@__invoke')->name('users.token');

Route::get('/product_export','ProductController@export')->name('product.export');
Route::post('/product_import','ProductController@import')->name('product.import');


Route::resource('products', 'ProductController')->middleware(['verified', AdminVerify::class]);

Route::patch('/change_state/{product}', 'ProductController@state')
    ->name('state')->middleware(['verified', AdminVerify::class]);


// Route::get('/user', 'Admin\UserController@index')
//     ->name('User')
//     ->middleware(['verified', AdminVerify::class]);

// Route::get('/editar/{usuarId}', 'Admin\UserController@editar')
//     ->name('editar')->middleware(['verified', AdminVerify::class]);

// Route::patch('/actualizar/{usuario}', 'Admin\UserController@actualizar')
//     ->name('actualizar')
//     ->middleware(['verified', AdminVerify::class]);

// Route::delete('/delete/{usuarId}', 'Admin\UserController@destroy')
//     ->name('destroy')
//     ->middleware(['verified', AdminVerify::class]);
