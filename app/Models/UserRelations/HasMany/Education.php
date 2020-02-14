<?php

namespace App\Models\UserRelations\HasMany;

trait Education
{
    public function education()
    {
        return $this->hasMany('App\Models\Education');
    }
}
