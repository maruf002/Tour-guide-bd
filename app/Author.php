<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $guard = 'author';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
