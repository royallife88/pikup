<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Laravelproject_new_customer extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    protected $guard = 'api';
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function laravelproject_new_goods_order(){
        return  $this->hasMany('App\Laravelproject_new_goods_order');
    }


    public function laravelproject_new_goods_favourite(){
        return  $this->hasMany('App\Laravelproject_new_goods_favourite');
    }
}
