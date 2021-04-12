<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
   	use SoftDeletes;
	protected $table = 'appointments';
	protected $primaryKey = 'appointment_id';
	
    protected $fillable = [
        'user_id' , 'vendor_id','vendor_service_id' , 'user_name','phone_number' , 'email','service_name' , 'price', 'appointment_date','appointment_time' , 'status',
    ];
}