<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class User extends Model implements AuthenticatableContract, AuthorizableContract
class ArenaImage extends Model
{
    //use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'arena_id', 'url', 'sort_no', 'main'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
