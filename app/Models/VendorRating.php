<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorRating extends Model
{
   	use SoftDeletes;
	protected $table = 'vendor_ratings';
	protected $primaryKey = 'vendor_rating_id';
	
    protected $fillable = [
        'user_id' , 'vendor_id', 'appointment_id' , 'rating' , 'review' ,
    ];
}