<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arena extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'franchise_id', 'arena_type_id', 'description', 'status', 'inactive_reason'
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

    public function franchise()
    {
        return $this->belongsTo('App\Franchise');
    }
}
