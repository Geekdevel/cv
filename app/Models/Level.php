<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }

    public function education()
    {
        return $this->hasMany('App\Models\Languale');
    }
}
