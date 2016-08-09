<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
	use SoftDeletes;
	
    public $primaryKey = 'brand_id';

    protected $dates = array('deleted_at');

    protected $fillable = array(
    	'name',
    	'description',
    	'image_path'
    );
}
