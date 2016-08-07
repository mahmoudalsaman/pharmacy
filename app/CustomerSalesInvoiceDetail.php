<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSalesInvoiceDetail extends Model
{
    public $primaryKey = 'customer_sales_invoice_detail_id';

    public $timestamps = false;

    protected $fillable = array(
    	'customer_sales_invoice_id_fk',
    	'product_id_fk',
    	'quantity'
    );
}
