<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ResponsableType extends Model
{
    protected $table = 'responsable_type';

    protected $fillable = [
        'nombre', 
    ];
}
