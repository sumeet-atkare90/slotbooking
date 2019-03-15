<?php

namespace App;

use App\Franchise;
use Illuminate\Database\Eloquent\Model;

// class User extends Model implements AuthenticatableContract, AuthorizableContract

class FranchiseWorkingDay extends Model
{
    //use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'franchise_id', 'monday', 'tuesday', 'wednesday', 'thursday', 'firday', 'saturday', 'sunday'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function franchise()
    {
        return $this->belongsTo('App\Franchise');
    }
}
