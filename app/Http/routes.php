<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('master');
});

Route::get('employee', function () {
    return view('employee');
});


Route::get('customer', function () {
    return view('customer');
});


Route::get('branch', function () {
    return view('branch');
});

Route::get('brand', function () {
    return view('brand');
});

Route::get('category', function () {
    return view('category');
});

Route::get('product', function () {
    return view('product');
});

Route::get('products-stocks', function () {
    return view('products-stocks');
});


Route::group(['prefix' => 'pharmacy/api'], function() {
	// Api version 1
	Route::group(['prefix' => 'v1'], function() {
		Route::resource('branches', 'Api\\BranchApi');
		Route::resource('users', 'Api\\UserApi');
		Route::resource('tags', 'Api\\TagApi');
		Route::resource('brands', 'Api\\BrandApi');
		Route::resource('products', 'Api\\ProductApi');
	});
});