<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'user_id',
        'skill',
        'level_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Lavel');
    }
}
