<?php

namespace App\Models\UserRelations\HasOne;

trait Profile
{
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
}
