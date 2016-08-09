<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitOfMeasurement extends Model
{
	use SoftDeletes;
	
	public $primaryKey = 'unit_of_measurement_id';

    protected $dates = array('deleted_at');

    protected $fillable = array(
    	'name',
    	'abbreviation'
    );
}
