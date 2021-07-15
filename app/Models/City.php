<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
   	use SoftDeletes;
	protected $table = 'cities';
	protected $primaryKey = 'city_id';
	
    protected $fillable = [
        'name','country_id'
    ];
}