<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Atributos que son asignables.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'lastName', 'password', 'email', 'phoneNumber', 'role',
    ];

    /**
     * Atributos que deben ser ocultos para arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
