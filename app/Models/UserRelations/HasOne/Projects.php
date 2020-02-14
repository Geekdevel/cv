<?php

namespace App\Models\UserRelations\HasOne;

trait Projects
{
    public function projects()
    {
        return $this->hasOne('App\Models\Project');
    }
}
