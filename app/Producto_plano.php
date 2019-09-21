<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_plano extends Model
{
    protected $table = "producto_planos";
    protected $fillable = [
        'image','order','product_id'
    ];
    
    public function product(){
        return $this->belongsTo('App\Producto', 'product_id');
    }
}
