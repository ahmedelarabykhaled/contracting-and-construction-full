<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainInfo extends Model
{
    protected $fillable = ['info' , 'content' , 'status'];
}
