<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 45);
            $table->string('Especie', 45);
            $table->string('Raza', 45);
            $table->string('Fecha_de_nacimiento', 45);
            $table->string('Genero', 45);
            $table->unsignedBigInteger('idCliente');
            $table->timestamps();
            $table->foreign('idCliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
