<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'user_id',
        'university',
        'specialty',
        'start',
        'finish',
        'degree'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
