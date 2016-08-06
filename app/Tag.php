<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    public $primaryKey = 'tag_id';

    protected $dates = array('deleted_at');

    protected $fillable = array(
    	'name'
    );
}
