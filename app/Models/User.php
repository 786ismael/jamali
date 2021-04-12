<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function zone(){
       return  $this->hasOne('App\Models\Zone','zone_id' , 'zone_id');
    }

    public function driverDocument(){
       return  $this->hasMany('App\Models\DriverDocument','user_id' , 'id');
    }

   /* public function getProfileImageAttribute($value){
        if($value==null){
          return asset('public/uploads/others/user_placeholder.png');
        }else{
            return asset('public/uploads/profiles/'.$value);
        }
    }*/
}
