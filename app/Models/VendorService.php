<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorService extends Model
{
   	use SoftDeletes;
	protected $table = 'vendor_services';
	protected $primaryKey = 'vendor_service_id';
	
    protected $fillable = [
        'vendor_id' , 'category_id', 'service_name' , 'rate', 'time_slots',
    ];
}