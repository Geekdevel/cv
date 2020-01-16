<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
