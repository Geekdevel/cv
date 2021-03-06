<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = [
        'user_id',
        'hobby'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
