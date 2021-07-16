<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'countries';
    protected $fillable = [
        'countries_name','countries_iso_code','countries_isd_code','status'
    ];
}
