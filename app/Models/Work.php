<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'user_id',
        'work',
        'level',
        'professi',
        'start',
        'finish',
        'function',
        'projects'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
