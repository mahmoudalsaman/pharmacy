<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CustomerSalesInvoice;
use App\CustomerSalesDelivery;
use App\CustomerSalesDeliveryApproval;

use Input;

class SalesApprovalApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesInvoices = CustomerSalesInvoice::join('users', 'customer_sales_invoices.user_id_fk', '=', 'users.user_id')
            ->leftJoin('customer_sales_deliveries', 'customer_sales_deliveries.customer_sales_invoice_id_fk', '=', 'customer_sales_invoices.customer_sales_invoice_id')
            ->join('customer_sales_invoice_details', 'customer_sales_invoice_details.customer_sales_invoice_id_fk', '=', 'customer_sales_invoices.customer_sales_invoice_id')
            ->select(
                'customer_sales_invoices.customer_sales_invoice_id',
                'customer_sales_invoices.user_id_fk',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'customer_sales_invoices.ordered_at',
                'customer_sales_invoices.status',
                'customer_sales_invoices.remarks',
                'customer_sales_deliveries.status as delivery_status'
            )
            ->groupBy('customer_sales_invoices.customer_sales_invoice_id')
            ->get();

        return response()->json(array(
            'sales_invoice_approval_lists'   => $salesInvoices
        ));
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
        $salesInvoice =  CustomerSalesInvoice::leftJoin('customer_sales_deliveries', 'customer_sales_deliveries.customer_sales_invoice_id_fk', '=', 'customer_sales_invoices.customer_sales_invoice_id')
            ->join('users', 'customer_sales_invoices.user_id_fk', '=', 'users.user_id')
            ->select(
                'users.cell_number',
                'customer_sales_invoices.customer_sales_invoice_id',
                'customer_sales_deliveries.customer_sales_delivery_id',
                'customer_sales_invoices.status',
                'customer_sales_deliveries.status as delivery_status'
            )
            ->where('customer_sales_invoices.customer_sales_invoice_id', '=', Input::get('salesInvoiceId'))
            ->first();

        if($salesInvoice->status == 'Approved') {
            return response()->json(array(
                'message'   => 'This order has already been approved!'
            ));
        }

        if($salesInvoice->delivery_status) {
            CustomerSalesDeliveryApproval::create(array(
                'customer_sales_delivery_id_fk' => $salesInvoice->customer_sales_delivery_id,
                'user_id_fk'    => session('user_id'),
                'status'        => 'Approved'
            ));

            $delivery = CustomerSalesDelivery::where('customer_sales_invoice_id_fk', '=', (int) Input::get('salesInvoiceId'))
                ->first();

            $delivery->status = 'Approved'; 

            $delivery->save();
        }

        $salesInvoice->status = 'Approved';

        $salesInvoice->save();
            
        $message = 'Your order has been approved. (Order #' . $salesInvoice->customer_sales_invoice_id . ')';

        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $salesInvoice->cell_number, '2' => $message, '3' => '09293310136_IT77U');
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
            'message'   => 'Order successfully approved!'
        ));
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
