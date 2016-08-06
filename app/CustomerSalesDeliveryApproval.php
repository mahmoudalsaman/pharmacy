<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSalesDeliveryApproval extends Model
{
    public $primaryKey = 'customer_sales_delivery_approval_id';

    protected $fillable = array(
    	'customer_sales_delivery_id_fk',
    	'user_id_fk',
    	'is_approved'
    );
}
