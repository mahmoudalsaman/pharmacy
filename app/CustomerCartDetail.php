<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerCartDetail extends Model
{
    public $primaryKey = 'customer_cart_detail_id';

    public $timestamps = false;

    protected $fillable = array(
    	'customer_cart_id_fk', 
        'product_id_fk',       
       	'quantity'
    );
}
