<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
   	use SoftDeletes;
	protected $table = 'categories';
    protected $primaryKey = 'category_id';
	
    protected $fillable = [
        'category_name' ,'category_image' ,'category_name_ar'
    ];

}