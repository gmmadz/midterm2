<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@getIndex');

Route::resource('customers', 'CustomerController', ['except' => ['create']]);
Route::resource('orders', 'OrderController', ['except' => ['create']]);
Route::resource('items', 'ItemController', ['except' => ['create', 'show']]);
Route::get('customer_order/{id}', 'CustomerController@show');
Route::get('order_details/{id}', 'OrderController@show');