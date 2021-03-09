<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    protected $table = 'chat';
	protected $primaryKey = 'chat_id';

    protected $fillable = [
        'chat_unique_id',
        'sender_id',
        'receiver_id',
        'message'
    ];
}
