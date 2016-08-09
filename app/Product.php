<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	
    public $primaryKey = 'product_id';

    protected $dates = array('deleted_at');

    protected $fillable = array(
    	'name',
    	'brand_id_fk',
    	'description',
    	'image_path',
    	'price'
    );
}
