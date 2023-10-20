<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Descripcion', 'Precio'];

    public function detalleventa(): HasMany
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
