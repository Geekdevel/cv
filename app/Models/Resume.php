<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'slag',
        'job_title',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
