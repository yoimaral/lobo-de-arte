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

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
/* middleware para bloquear las rutas si no esta logueado */

Route::get('/user', 'UserController@index')->name('User')->middleware('verified', AdminVerify::class);
/* AdminVerify para que la persona que este logueada y no sea admin lo saque de la tabla user */

Route::get('/editar/{usuarId}', 'UserController@editar')->name('editar')->middleware(
    'verified',
    AdminVerify::class
);

Route::patch('/actualizar/{usuarId}', 'UserController@actualizar')->name('actualizar')->middleware(
    'verified',
    AdminVerify::class
);

Route::delete('/delete/{usuarId}', 'UserController@destroy')->name('destroy')->middleware(
    'verified',
    AdminVerify::class
);
