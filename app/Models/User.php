<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
         'deleted_at'
    ];

    protected $with = [
        'profile'
    ];

    // Has One Relations
    use UserRelations\HasOne\Address;
    use UserRelations\HasOne\Profile;
    use UserRelations\HasOne\Projects;

    // Has Many Relations
    use UserRelations\HasMany\Education;
    use UserRelations\HasMany\Hobbies;
    use UserRelations\HasMany\Languages;
    use UserRelations\HasMany\Skills;
    use UserRelations\HasMany\Resumes;
    use UserRelations\HasMany\Experiences;

}
