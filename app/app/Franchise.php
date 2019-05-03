<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'tag_line', 'address', 'lat', 'lon', 'phone', 'additional_phone', 'email', 'logo', 'status', 'inactive_reason', 'allow_on_site', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function arenas()
    {
        return $this->hasMany('App\Arena');
    }
}
