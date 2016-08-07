<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSalesDelivery extends Model
{
    public $primaryKey = 'customer_sales_delivery_id';

    public $timestamps = false;

    protected $fillable = array(
    	'customer_sales_invoice_id_fk',
    	'shipping_address',
    	'status'
    );
}
