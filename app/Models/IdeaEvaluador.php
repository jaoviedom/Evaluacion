<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaEvaluador extends Model
{
    protected $fillable = [
        'idea_id',
        'user_id',
    ];
}
