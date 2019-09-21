<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad_categoria extends Model
{
    protected $table = "novedad_categorias";
    protected $fillable = [
         'title_es', 'order'
    ];

    public function article(){
        return $this->hasMany('App\Novedad_articulo', 'novedad_id');
    }
}
