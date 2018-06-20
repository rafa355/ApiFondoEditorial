<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class SolicitanteType extends Model
{
    protected $table = 'solicitante_type';

    protected $fillable = [
        'nombre', 
    ];
}
