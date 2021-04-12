<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionHistory extends Model
{
   	use SoftDeletes;
	protected $table = 'transaction_history';
	protected $primaryKey = 'transaction_history_id';
	
    protected $fillable = [
        'user_id', 'trip_id', 'paypal_charge', 'payment_method', 'payment_type', 'transaction_id', 'currency', 'amount', 'transaction_status'
    ];
}