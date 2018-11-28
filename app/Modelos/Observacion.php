<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observacioness';

    protected $fillable = [
        'observacion','titulo','actualizacion'
    ];

}
