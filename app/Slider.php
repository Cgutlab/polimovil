<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  protected $table = 'sliders';
  protected $fillable = [
     'image', 'order', 'section', 'type', 'title_es', 'text_es', 'subtitle_es',
  ];
}
