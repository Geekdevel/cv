<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobbi extends Model
{
    protected $fillable = [
        'user_id',
        'hobbi'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
