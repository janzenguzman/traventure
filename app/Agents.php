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
        'status', 'active', 'photo', 'office_address', 'lat', 'lng', 'password', 'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'old_pass', 'new_pass', 'confirm_pass'
    ];
}
