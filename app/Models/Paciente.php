<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Especie', 'Raza', 'Fecha_de_nacimiento', 'Genero', 'idCliente'];

    public function cita(): HasMany
    {
        return $this->hasMany(Cita::class);
    }
}
