<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class User extends Model implements AuthenticatableContract, AuthorizableContract
class Franchise extends Model
{
    //use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'tag_line', 'address', 'lat', 'lon', 'phone', 'additional_phone', 'email', 'logo', 'status', 'inactive_reason', 'allow_on_site'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
