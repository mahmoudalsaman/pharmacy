<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    public $primaryKey = 'product_tag_id';

    protected $fillable = array(
    	'product_id_fk',
    	'tag_id_fk'
    );
}
