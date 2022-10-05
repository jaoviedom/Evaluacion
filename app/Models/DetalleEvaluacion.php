<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DetalleEvaluacion extends Model
{
    use softDeletes;

    protected $fillable = [
        'criterio1',
        'criterio2',
        'criterio3',
        'criterio4',
        'criterio5',
        'criterio6',
        'criterio7',
        'criterio8',
        'criterio9',
        'criterio10',
        'capAcomp1',
        'capAcomp2',
        'capAcomp3',
        'capAcomp4',
        'capEjec1',
        'capEjec2',
        'observaciones',
        'evaluacion_id',
        'user_id'
    ];
}
