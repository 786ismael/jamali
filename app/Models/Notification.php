<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
   	use SoftDeletes;
	protected $table = 'notifications';
	protected $primaryKey = 'notification_id';
	
    protected $fillable = [
        'sender_id' , 'receiver_id', 'title' , 'message', 'json_data',
    ];
}