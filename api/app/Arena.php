<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class User extends Model implements AuthenticatableContract, AuthorizableContract
class Arena extends Model
{
    //use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'franchise_id', 'arena_type_id', 'description', 'status', 'inactive_reason'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
