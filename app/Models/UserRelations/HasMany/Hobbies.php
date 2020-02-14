<?php

namespace App\Models\UserRelations\HasMany;

trait Hobbies
{
    public function hobbies()
    {
        return $this->hasMany('App\Models\Hobby');
    }
}
