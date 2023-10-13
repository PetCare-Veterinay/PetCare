<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('idDetalle_Venta');
            $table->string('Cantidad', 45);
            $table->unsignedBigInteger('Producto_idProducto');
            $table->unsignedBigInteger('Servicio_idServicio');
            $table->timestamps();
            $table->foreign('Producto_idProducto')->references('idProducto')->on('producto');
            $table->foreign('Servicio_idServicio')->references('idServicio')->on('servicio');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
