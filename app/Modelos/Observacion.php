<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observaciones';

    protected $fillable = [
        'observacion','titulo'
    ];

}
