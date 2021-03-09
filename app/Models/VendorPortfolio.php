<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorPortfolio extends Model
{
   	use SoftDeletes;
	protected $table = 'vendor_portfolios';
	protected $primaryKey = 'vendor_portfolio_id';
	
    protected $fillable = [
        'vendor_id' , 'portfolio_image',
    ];
}