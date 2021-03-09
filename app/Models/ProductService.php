<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductService extends Model
{
   	use SoftDeletes;
	protected $table = 'product';
	protected $primaryKey = 'id';
	
    protected $fillable = [
        'product_name', 'product_image', 'price', 'offer', 'user_id'
    ];
}