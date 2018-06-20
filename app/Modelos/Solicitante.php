<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $table = 'solicitantes';

    protected $fillable = [
        'nombre', 
    ];
}
