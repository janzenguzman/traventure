<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //Table Name
    protected $table = 'packages';
    //Primary Key
    public $primaryKey = 'package_id';
}
