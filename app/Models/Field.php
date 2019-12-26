<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function summary()
    {
        return $this->belongsTo('App\Models\Summary');
    }
}
