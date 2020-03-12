<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Laravelproject_new_driver extends Authenticatable implements JWTSubject 
{

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'social_security_number', 'dob', 'age', 'address', 'phone_number', 'date_started_working', 'license_number', 'licence_expiry_date', 'home_region', 'driver_level', 'bank_routing_number', 'bank_account_number', 'license_image'
    ];

    protected $guard = 'driverapi';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
