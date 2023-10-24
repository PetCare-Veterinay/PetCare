<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = ['Motivo', 'Fecha', 'Hora', 'idPaciente', 'idDiagnostico'];

    public function paciente()
    {
        return $this->hasMany(Paciente::class);
    }

    public function cliente()
    {
        return $this->hasMany(Cliente::class);
    }

}
