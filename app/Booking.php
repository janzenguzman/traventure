<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //Table Name
    protected $table = 'bookings';
    //Primary Key
    public $primaryKey = 'booking_id';
    
    public function traveler(){
        return $this->belongsTo('App\Travelers');
    }

    public function packages(){
        return $this->hasMany('App\Package', 'package_id');
    }
}
