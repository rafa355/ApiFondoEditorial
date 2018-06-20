<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class EtapaProyectoType extends Model
{
    protected $table = 'etapas_type';

    protected $fillable = [
        'nombre', 
    ];
}
