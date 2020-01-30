<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill_level extends Model
{
    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }

}
