<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_imagen extends Model
{
    protected $table = "producto_imagens";
    protected $fillable = [
        'image','order','product_id'
    ];
    
	public function producto()
	{
		return $this->belongsTo('App\Producto', 'product_id');
	}

    public function product(){
        return $this->belongsTo('App\Producto', 'product_id');
    }
}
