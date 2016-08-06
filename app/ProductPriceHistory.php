<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPriceHistory extends Model
{
    public $primaryKey = 'product_price_history_id';

    protected $fillable = array(
    	'product_id_fk',
    	'price',
    	'created_at'
    );
}
