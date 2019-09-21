<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    protected $table = 'reds';
    protected $fillable = [
         'image','route','order'
    ];
}
