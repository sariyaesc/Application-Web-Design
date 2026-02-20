<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class universe extends Model
{
    protected $table = 'universes';
    protected $fillable = ['universe', 'company', 'age'];

    public function characters()
    {
        return $this->hasMany(Character::class, 'id_universe');
    }
}
