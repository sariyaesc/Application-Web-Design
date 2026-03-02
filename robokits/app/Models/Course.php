<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- 1. IMPORTAR ESTO
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; // <--- 2. USAR ESTO DENTRO DE LA CLASE

    protected $fillable = ['title', 'cover_image', 'content', 'robotics_kit_id'];

    // Relaciones
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function roboticsKit()
    {
        return $this->belongsTo(RoboticsKit::class);
    }
}