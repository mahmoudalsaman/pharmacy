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
	
	file_get_contents($url, false, $context);

	return 'Yey!';
});

Route::get('pdf', function() {
	return PDF::loadView('pdf.test', [])
		->stream();
});

Route::get('/', function () {
    return redirect('login');
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

Route::post('register', 'RegistrationController@doRegister');

Route::get('transaction', function () {
    return view('transaction')
    	->with('order_transactions', App\CustomerSalesInvoice::join('users', 'customer_sales_invoices.user_id_fk', '=', 'users.user_id')
    		->leftJoin('customer_sales_deliveries', 'customer_sales_deliveries.customer_sales_invoice_id_fk', '=', 'customer_sales_invoices.customer_sales_invoice_id')
    		->join('customer_sales_invoice_details', 'customer_sales_invoice_details.customer_sales_invoice_id_fk', '=', 'customer_sales_invoices.customer_sales_invoice_id')
    		->select(
    			'customer_sales_invoices.customer_sales_invoice_id',
    			'users.first_name',
    			'users.middle_name',
    			'users.last_name',
    			'customer_sales_invoices.ordered_at',
    			'customer_sales_invoices.status',
    			'customer_sales_invoices.remarks',
    			'customer_sales_deliveries.status as delivery_status'
    		)
    		->get());
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

Route::get('uom', function () {
    return view('uom');
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
		Route::resource('brands', 'Api\\BrandApi');
		Route::resource('products', 'Api\\ProductApi');
		Route::resource('uoms', 'Api\\UnitOfMeasurementApi');
		Route::resource('carts', 'Api\\CartApi');
		Route::resource('sales-invoices', 'Api\\SalesInvoiceApi');
		Route::resource('sales-approvals', 'Api\\SalesApprovalApi');
	});
});