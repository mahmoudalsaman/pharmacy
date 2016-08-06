<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInventory extends Model
{
    public $primaryKey = 'product_inventory_id';

    protected $dates = array('deleted_at');

    protected $fillable = array(
    	'branch_id_fk',
    	'user_id_fk',
    	'product_id_fk',
    	'previous_value',
    	'current_value'
    );
}
