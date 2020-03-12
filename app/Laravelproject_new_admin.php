<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Laravelproject_new_admin extends Authenticatable
{
    use HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role', 'social_security_number', 'dob','age', 'address', 'phone_number', 'date_started_working', 'job_description', 'bank_routing_number', 'bank_account_number', 'profile_image'
    ];
}
