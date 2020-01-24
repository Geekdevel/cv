<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;

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

    static function slag( $slag )
    {
        $resume = Resume::where('slag', $slag)->first();
        return $resume;
    }
}
