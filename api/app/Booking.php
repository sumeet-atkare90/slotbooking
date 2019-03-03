<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class User extends Model implements AuthenticatableContract, AuthorizableContract
class Booking extends Model
{
    //use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'franchise_id', 'arena_id', 'booking_datetime', 'status', 'name', 'phone', 'email'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
