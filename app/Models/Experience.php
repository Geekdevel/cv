<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'company',
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
