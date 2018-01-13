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
Route::get('/downloadPDF/{any?}','PagoController@imprimirPDF');
Route::get('/imprimereporte','PagoController@imprimereporte');


Route::resource('ppal/pago','PpalController');
Route::resource('ppal/cliente','PpalController');
Route::resource('ppal/factura','PagoController');
Route::post('ppal/stores/{any?}','PpalController@stores');

Route::get('/home', 'HomeController@index')->name('home');
