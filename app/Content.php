<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = [
       'section','order','type','title_es','subtitle_es','text_es','image1','image2','image3'
    ];
}
