<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Travelers extends Authenticatable
{
    
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'gender', 'username', 'email', 'contact_no', 'password', 'birthday', 'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bookings(){
        return $this->hasMany('App\Booking');
    }

    public function package(){
        return $this->hasOne('App\Package');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorites', 'traveler_id');
    }
}
