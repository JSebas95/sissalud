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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::resource('ppal/pago','PpalController');
Route::get('ppal/stores/{any?}','PpalController@stores');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/stores', 'PpalController@stores');
