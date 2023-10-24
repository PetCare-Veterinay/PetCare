<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $fillable = ['Cantidad', 'idProducto', 'idServicio'];

    public function venta()
    {
        return $this->hasMany(Ventas::class);
    }

    public function servicio()
    {
        return $this->hasMany(Servicio::class);
    }

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }

}