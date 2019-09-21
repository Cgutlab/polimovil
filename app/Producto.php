<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    protected $fillable = [
        'title_es','code','text_es','order','outstanding','family_id', 'document', 'keyword_es'
    ];
    
    public function family(){
        return $this->belongsTo('App\Producto_familia', 'family_id');
    }

    public function galleries()
    {
        return $this->hasMany('App\Producto_imagen', 'product_id');
    }
    
    public function images(){
        return $this->hasMany('App\Producto_imagen', 'product_id');
    }

    public function colors(){
        return $this->hasMany('App\Producto_color', 'product_id');
    }

    public function planos(){
        return $this->hasMany('App\Producto_plano', 'product_id');
    }

    public function uso(){
        return $this->belongsToMany('App\Uso', 'uso_producto', 'uso_id', 'producto_id');
        
    }
}
