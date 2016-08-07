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

Route::get('test', function() {
	$url = 'https://www.itexmo.com/php_api/api.php';
	$itexmo = array('1' => '09396531608', '2' => 'This is a test message! Blablabla...qwertyuiop', '3' => '09396531608_RI1AE');
	$param = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($itexmo),
	    ),
	);
	$context  = stream_context_create($param);
	
	return file_get_contents($url, false, $context);
});

Route::get('pdf', function() {
	return PDF::loadView('pdf.test', [])
		->stream();
});

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

Route::get('inventory', function () {
    return view('inventory');
});

Route::get('transaction', function () {
    return view('transaction');
});

Route::get('login', function () {
    return view('login');
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