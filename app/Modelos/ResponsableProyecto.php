<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ResponsableProyecto extends Model
{
    protected $table = 'responsable_proyecto';

    protected $fillable = [
        'nombre', 
    ];
}
