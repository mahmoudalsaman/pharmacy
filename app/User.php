<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    public $primaryKey = 'user_id';

    protected $dates = array('deleted_at');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_id_fk', 
        'user_type', 
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'password',
        'cell_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
