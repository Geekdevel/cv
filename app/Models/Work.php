<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'user_id',
        'experience',
        'position',
        'start',
        'finish',
        'functions',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
