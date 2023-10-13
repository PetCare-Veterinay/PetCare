<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id('idPaciente');
            $table->string('Nombre', 45);
            $table->string('Especie', 45);
            $table->string('Raza', 45);
            $table->string('Fecha_de_nacimiento', 45);
            $table->string('Genero', 45);
            $table->unsignedBigInteger('Cliente_idCliente');
            $table->timestamps();
            $table->foreign('Cliente_idCliente')->references('idCliente')->on('cliente');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
