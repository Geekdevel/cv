<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable = [
        'user_id',
        'slag',
        'job_title',
        'description',
        'field_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function filds()
    {
        return $this->hasOne('App\Models\Field');
    }
}
