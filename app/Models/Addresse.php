<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    protected $fillable = [
        'user_id',
        'country',
        'region',
        'city',
        'index',
        'street',
        'house',
        'apartment'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
