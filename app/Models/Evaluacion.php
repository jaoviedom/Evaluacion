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
        "pCriterio1",
        "pCriterio2",
        "pCriterio3",
        "pCriterio4",
        "pCriterio5",
        "pCriterio6",
        "pCriterio7",
        "pCriterio8",
        "pCriterio9",
        "pCriterio10",
        'viabFormulacion',
        'viabInnovacion',
        'viabMercado',
        'viabPromedio',
        'observaciones',
        'recomendaciones',
        'idea_id',
    ];
}
