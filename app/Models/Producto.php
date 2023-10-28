<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre', 'Descripcion', 'Precio','Stock'];
    public function detalleventa(): HasMany
    {
        return $this->hasMany(DetalleVenta::class);
    }
}