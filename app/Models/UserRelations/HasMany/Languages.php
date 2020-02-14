<?php

namespace App\Models\UserRelations\HasMany;

trait Languages
{
    public function languages()
    {
        return $this->hasMany('App\Models\Language');
    }
}
