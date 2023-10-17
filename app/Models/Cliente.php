<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function ventas(): HasMany
    {
        return $this->hasMany(Ventas::class);
    }

    public function pacientes(): HasMany
    {
        return $this->hasMany(Pacientes::class);
    }
}
