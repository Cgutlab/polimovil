<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_color extends Model
{
    protected $table = "producto_colors";
    protected $fillable = [
        'image','order','product_id','title_es'
    ];
    
    public function product(){
        return $this->belongsTo('App\Producto', 'product_id');
    }
}
