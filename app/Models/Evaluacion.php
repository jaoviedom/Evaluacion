<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    use softDeletes;

    protected $fillable = [
        'fecha',
        'comite',
        'viabFormulacion',
        'viabInnovacion',
        'viabMercado',
        'viabPromedio',
        'observaciones',
        'recomendaciones',
        'idea_id',
    ];
}
