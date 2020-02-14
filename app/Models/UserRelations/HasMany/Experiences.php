<?php

namespace App\Models\UserRelations\HasMany;

trait Experiences
{
    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
    }
}
