<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportType extends Model
{
	protected $table = 'support_type';
	protected $primaryKey = 'id';
	
    protected $fillable = [
        'support_name'
    ];
}