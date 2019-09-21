<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsoImagen extends Model
{
    protected $table = 'uso_imagens';
    protected $fillable = [
		'image', 'orden', 'uso_id'
	];

	public function usoimage(){
		return $this->hasMany('App\Uso', 'uso_id');
	}
}