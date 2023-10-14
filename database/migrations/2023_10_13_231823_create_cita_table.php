<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->id('idCita');
            $table->string('Motivo', 245);
            $table->date('Fecha');
            $table->dateTime('Hora');
            $table->unsignedBigInteger('Usuarios_idUsuario'); // Cambio de nombre de columna
            $table->unsignedBigInteger('Diagnostico_idDiagnostico');
            $table->timestamps();
            
            $table->foreign('Usuarios_idUsuario')->references('id')->on('users');
            $table->foreign('Diagnostico_idDiagnostico')->references('idDiagnostico')->on('diagnostico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita');
    }
}
