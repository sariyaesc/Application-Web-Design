<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    // This is CRITICAL. Without this, Laravel blocks the POST data.
    protected $fillable = [
        'titulo', 
        'descripcion', 
        'completada', 
        'fecha_limite'
    ];
}