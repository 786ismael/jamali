<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteVendor extends Model
{
    protected $table = 'favourite_vendors';
    
    public function vendor(){
        return $this->hasOne('App\User','id','vendor_id');
    }

}