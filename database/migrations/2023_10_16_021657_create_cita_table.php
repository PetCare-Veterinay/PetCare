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
            $table->unsignedBigInteger('Paciente_idPaciente'); // Cambio de nombre de columna
            $table->unsignedBigInteger('Diagnostico_idDiagnostico');
            $table->timestamps();
            
            $table->foreign('Paciente_idPaciente')->references('idPaciente')->on('paciente');
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
