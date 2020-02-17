<?php

namespace App\Models\UserRelations\HasMany;

trait Resumes
{
    public function resumes()
    {
        return $this->hasMany('App\Models\Resume');
    }

    public function resumesSlagId()
    {
        return $this->hasMany('App\Models\Resume')->select('slug', 'id');
    }
}
