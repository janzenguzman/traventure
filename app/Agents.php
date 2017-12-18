<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agents extends Authenticatable
{
    use Notifiable;

    protected $table = 'agents';
    public $primaryKey = 'id';
    protected $guard = 'agents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'fname', 'lname', 'job_position', 'contact_no', 'email', 
            'password', 'status', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}
