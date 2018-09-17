<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'contenido','adjunto_id'
    ];
    
}
