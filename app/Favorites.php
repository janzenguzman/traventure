<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    //Table Name
    protected $table = 'favorites';
    //Primary Key
    public $primaryKey = 'favorite_id';

    public function traveler()
    {
        return $this->belongsTo('App\Travelers');
    }

    public function package()
    {
        return $this->belongsTo('App\Package');
    }
}
