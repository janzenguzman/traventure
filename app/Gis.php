<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gis extends Model
{
    public $fillable = [
        'destination',
        'lat',
        'lng'
    ];
}
