<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Table Name
    protected $table = 'comments';
    //Primary Key
    public $primaryKey = 'id';

    protected $fillable = [
        'traveler_fname', 'traveler_lname', 'package_id', 'comment', 'rating',
    ];

}
