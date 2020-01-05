<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'web_site',
        'photo',
        'dribbble',
        'behance',
        'git',
        'linkedin'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
