<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSalesInvoice extends Model
{
    public $primaryKey = 'customer_sales_invoice_id';

    protected $fillable = array(
    	'branch_id_fk',
    	'user_id_fk',
    	'remarks',
    	'amount_paid',
    	'ordered_at'
    );
}
