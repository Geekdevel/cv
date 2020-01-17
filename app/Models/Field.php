<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'user_id',
        'field'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
