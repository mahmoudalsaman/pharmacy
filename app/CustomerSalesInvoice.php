<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSalesInvoice extends Model
{
    public $primaryKey = 'customer_sales_invoice_id';

    public $timestamps = false;

    protected $fillable = array(
    	'user_id_fk',
    	'remarks',
    	'ordered_at'
    );
}
