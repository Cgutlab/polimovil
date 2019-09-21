<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_familia extends Model
{
    protected $table = "producto_familias";
    protected $fillable = [
        'image','title_es','order','level','family_id'
    ];
    
    public function familia(){
        return $this->belongsTo('App\Producto_familia', 'family_id');
    }
    public function familias(){
        return $this->hasMany('App\Producto_familia', 'family_id');
    }

    public function producto(){
        return $this->hasMany('App\Producto', 'family_id');
    }
}
