<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CustomerCart;
use App\CustomerCartDetail;
use App\CustomerSalesInvoice;
use App\CustomerSalesInvoiceDetail;
use App\CustomerSalesDelivery;
use App\ProductInventory;

use Carbon\Carbon;
use DB;

class SalesInvoiceApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $salesInvoice = new CustomerSalesInvoice();

            $salesInvoice->user_id_fk = session('user_id');
            $salesInvoice->remarks = $request->remarks;
            $salesInvoice->status = 'Pending';
            $salesInvoice->ordered_at = Carbon::now();

            $salesInvoice->save();

            for($i = 0; $i < count($request->ordered_products); $i++) {
                CustomerSalesInvoiceDetail::create(array(
                    'customer_sales_invoice_id_fk'  => $salesInvoice->customer_sales_invoice_id,
                    'product_id_fk'                 => $request->ordered_products[$i]['product_id'],
                    'quantity'                      => $request->ordered_products[$i]['quantity']
                ));

                $productInventory = ProductInventory::where('product_id_fk', '=', $request->ordered_products[$i]['product_id'])
                    ->first();

                $productInventory->previous_value = $productInventory->current_value;
                $productInventory->current_value -= $request->ordered_products[$i]['quantity'];                

                $productInventory->save();

                $customerCart = CustomerCart::where('customer_cart_id', '=', (int) $request->ordered_products[$i]['customer_cart_id'])
                    ->first();

                $customerCart->delete();
            }

            if($request->remarks == 'Delivery') {
                CustomerSalesDelivery::create(array(
                    'customer_sales_invoice_id_fk'  => $salesInvoice->customer_sales_invoice_id,
                    'shipping_address'              => $request->delivery_address,
                    'status'                        => 'Pending'
                ));
            }

            DB::commit();

            $url = 'https://www.itexmo.com/php_api/api.php';
            $itexmo = array('1' => session('user_phone_number'), '2' => 'Orders placed successfully! Please wait for admin to review your orders. Thank you! (Order #:' . $salesInvoice->customer_sales_invoice_id . ')', '3' => '09293310136_IT77U');
            $param = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($itexmo),
                ),
            );
            $context  = stream_context_create($param);
            
            file_get_contents($url, false, $context);

            return response()->json(array(
                'message' => 'Order placed successfully!'
            ));
        } catch(QueryException $ex) {
            DB::rollBack();

            return response()->json(array(
                'message' => 'Order placed failed! ' . $ex
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
