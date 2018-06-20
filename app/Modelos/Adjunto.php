<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
    protected $table = 'adjuntos';

    protected $fillable = [
        'nombre', 
    ];
}
