<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agents extends Authenticatable
{
    use Notifiable;

    protected $guard = 'agents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companyName', 
        'name', 
        'position', 
        'contactNo', 
        'email', 
        'password',
        'agentPhoto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
