<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppRating extends Model
{
   	use SoftDeletes;
	protected $table = 'app_ratings';
	protected $primaryKey = 'app_rating_id';
	
    protected $fillable = [
        'user_id' , 'rating' , 'review' ,
    ];
}