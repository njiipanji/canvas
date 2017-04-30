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

Route::get('/', 'UserController@index');

Route::get('/cari', function() {
    return redirect('/');
});
Route::put('/cari', 'UserController@cari');

Route::get('/cari/{id_pemesanan}', function() {
    return redirect('/');
});

Route::get('/login', 'UserController@login');

Route::resource('/admin', 'AdminController');

Auth::routes();