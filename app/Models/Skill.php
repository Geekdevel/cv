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

    protected $with = [
        'level'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
}
