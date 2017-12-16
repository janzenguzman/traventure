<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    public function traveler(){
        return $this->belongsTo('App\Travelers');
    }

    public function package(){
        return $this->hasMany('App\Package');
    }
}
