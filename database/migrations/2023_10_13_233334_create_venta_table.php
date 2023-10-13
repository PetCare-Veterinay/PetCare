<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id('idVenta');
            $table->date('Fecha');
            $table->decimal('Precio_Total', 8, 2);
            $table->unsignedBigInteger('Cliente_idCliente');
            $table->unsignedBigInteger('Detalle_Venta_idDetalle_Venta');
            $table->timestamps();

            $table->foreign('Cliente_idCliente')->references('idCliente')->on('cliente');
            $table->foreign('Detalle_Venta_idDetalle_Venta')->references('idDetalle_Venta')->on('detalle_venta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
