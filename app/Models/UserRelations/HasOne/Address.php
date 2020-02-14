<?php

namespace App\Models\UserRelations\HasOne;

trait Address
{
    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }
}
