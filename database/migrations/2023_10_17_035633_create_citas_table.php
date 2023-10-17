<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('Motivo', 245);
            $table->date('Fecha');
            $table->dateTime('Hora');
            $table->unsignedBigInteger('idPaciente'); // Cambio de nombre de columna
            $table->unsignedBigInteger('idDiagnostico');
            $table->timestamps();
            
            $table->foreign('idPaciente')->references('id')->on('pacientes');
            $table->foreign('idDiagnostico')->references('id')->on('diagnosticos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
