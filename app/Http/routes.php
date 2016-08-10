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
	$itexmo = array('1' => 'fjdlskjfkdsjklfjdskljfkdsjklfdjkfsdj', '2' => 'This is a test message! Blablabla...qwertyuiop', '3' => '09396531608_RI1AE');
	$param = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($itexmo),
	    ),
	);
	$context  = stream_context_create($param);
	
	file_get_contents($url, false, $context);

	return 'Yey!';
});

Route::get('/', function () {
    return redirect('login');
});

Route::group(['prefix' => 'maintenance'], function() {
	Route::get('employee', function () {
	    return view('employee');
	});


	Route::get('customer', function () {
	    return view('customer');
	});


	Route::get('branch', function () {
	    return view('branch');
	});


	Route::get('category', function () {
	    return view('category');
	});

	Route::get('uom', function () {
	    return view('uom');
	});

	Route::get('product', function () {
	    return view('product');
	});
});

Route::post('register', 'RegistrationController@doRegister');

Route::get('transaction', function () {
    return view('transaction');
});

Route::get('login', function () {
    return view('login');
});

Route::get('order', function () {
    return view('order');
});

Route::get('cart', function () {
    return view('cart');
});

Route::get('register', function () {
    return view('register');
});

Route::get('home', function() {
	return view('master');
});

Route::get('logout', function() {
	session()->flush();

	return redirect('login');
});

Route::post('login', 'LoginController@doLogin');
Route::post('register', 'RegistrationController@doRegister');
Route::post('forgot-password', 'LoginController@forgotPassword');

Route::group(['prefix' => 'pharmacy/api'], function() {
	// Api version 1
	Route::group(['prefix' => 'v1'], function() {
		Route::resource('branches', 'Api\\BranchApi');
		Route::resource('users', 'Api\\UserApi');
		Route::resource('categories', 'Api\\CategoryApi');
		Route::resource('products', 'Api\\ProductApi');
		Route::resource('uoms', 'Api\\UnitOfMeasurementApi');
		Route::resource('carts', 'Api\\CartApi');
		Route::resource('sales-invoices', 'Api\\SalesInvoiceApi');
		Route::resource('sales-approvals', 'Api\\SalesApprovalApi');
	});
});