<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = ['Fecha_Inicio', 'Fecha_Final', 'Nombre_tratamiento', 'Medicamento', 'Dosis', 'Duracion', 'Costo'];
    
    public function diagnostico(): HasMany
    {
        return $this->hasMany(Diagnostico::class);
    }
}
