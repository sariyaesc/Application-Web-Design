<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';
    protected $fillable = ['name', 'real_name', 'gender', 'id_universe'];

    public function universe()
    {
        return $this->belongsTo(Universe::class, 'id_universe');
    }
}
