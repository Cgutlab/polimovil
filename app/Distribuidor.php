<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    protected $table = 'distribuidors';
    protected $fillable = [
        'local','direction','phone','altitude','length','order',
    ];
}
