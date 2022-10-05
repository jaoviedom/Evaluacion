<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
        'titulo',
        'codigo',
        'talento',
        'profesion',
        'tipoActor',
        'email',
        'celular',
        'gestor', 
        'estado',
    ];
}
