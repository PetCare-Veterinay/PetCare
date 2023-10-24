<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Apellido', 'Telefono', 'email', 'Direccion'];

    public function ventas()
    {
        return $this->hasMany(Ventas::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}

