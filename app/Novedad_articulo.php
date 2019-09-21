<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad_articulo extends Model
{
    protected $table = 'novedad_articulos';
    protected $fillable = [
        'image', 'extract_es', 'title_es', 'subtitle_es', 'text_es', 'novedad_id', 'order'
    ];

    public function category(){
        return $this->belongsTo('App\Novedad_categoria', 'novedad_id');
    }
}
