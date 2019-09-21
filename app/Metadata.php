<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $table = 'metadata';
    protected $fillable = [
        'section','keyword_es','description_es'
    ];
}
