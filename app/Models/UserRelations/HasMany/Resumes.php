<?php

namespace App\Models\UserRelations\HasMany;

trait Resumes
{
    public function resumes()
    {
        return $this->hasMany('App\Models\Resume');
    }
}
