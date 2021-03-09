<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
   	use SoftDeletes;
	protected $table = 'supports';
	protected $primaryKey = 'support_id';
	
    protected $fillable = [
        'user_id' , 'support_type', 'user_name' , 'phone_number', 'email', 'message',
    ];
}