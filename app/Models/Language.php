<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'user_id',
        'language',
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
