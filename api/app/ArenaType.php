<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class User extends Model implements AuthenticatableContract, AuthorizableContract
class ArenaType extends Model
{
    //use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
