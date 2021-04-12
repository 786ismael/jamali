<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commission extends Model
{
   	use SoftDeletes;
	protected $table = 'commissions';
	protected $primaryKey = 'commission_id';
	
    protected $fillable = [
        'type' , 'price'
    ];
}