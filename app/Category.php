<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	
    public $primaryKey = 'category_id';

    protected $dates = array('deleted_at');

    protected $fillable = array(
    	'name'
    );
}
