<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    public $primaryKey = 'branch_id';

    protected $dates = array('deleted_at');

    protected $fillable = array(
    	'name',
    	'description',
    	'address',
    	'image_path'
    );
}
