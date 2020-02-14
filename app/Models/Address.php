<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'country',
        'region',
        'city',
        'index',
        'street'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
