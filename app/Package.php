<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorites;
use Illuminate\Support\Facades\Auth;
use Eloquent;

class Package extends Model
{
    //Table Name
    protected $table = 'packages';
    //Primary Key
    public $primaryKey = 'package_id';

    protected $guarded = [];

    public function booking(){
        return $this->belongsTo('App\Booking');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorites', 'package_id');
    }
}
