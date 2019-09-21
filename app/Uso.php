<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uso extends Model
{
    protected $table = 'usos';
    protected $fillable = [
		'title_es', 'text_es', 'order', 'outstanding'
	];

	public function product(){
		return $this->belongsToMany('App\Producto', 'uso_producto', 'uso_id', 'producto_id');
	}

	public function usoimage(){
		return $this->hasMany('App\UsoImagen', 'uso_id');
	}
}
