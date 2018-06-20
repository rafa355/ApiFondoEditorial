<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class EtapaProyecto extends Model
{
    protected $table = 'etapas_proyectos';

    protected $fillable = [
        'nombre', 
    ];
}
