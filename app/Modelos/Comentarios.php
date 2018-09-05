<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'conteido','adjunto_id'
    ];
    
}
