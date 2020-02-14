<?php

namespace App\Models\UserRelations\HasMany;

trait Skills
{
    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }
}
