<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorDay extends Model
{
   	use SoftDeletes;
	protected $table = 'vendor_days';
	protected $primaryKey = 'vendor_day_id';
	
    protected $fillable = [
        'vendor_id' , 'day_id', 'day_name' , 'day_status', 'start_time', 'end_time',
    ];
}