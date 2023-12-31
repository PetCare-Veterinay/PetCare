<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;
    protected $fillable = ['Vacunas', 'Examenes_Laboratorio', 'Recomendaciones','Plan_Seguimiento', 'Enfermedades','idTratamiento'];

    public function tratamiento()
    {
        return $this->hasMany(Tratamiento::class);
    }

    public function cita()
    {
        return $this->hasMany(Cita::class);
    }
}