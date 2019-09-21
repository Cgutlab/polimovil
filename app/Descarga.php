<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    protected $table = 'descargas';
    protected $fillable = [
      'image','title_es','order','file'
    ];

}
