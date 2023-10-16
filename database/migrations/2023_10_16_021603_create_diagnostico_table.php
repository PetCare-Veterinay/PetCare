<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico', function (Blueprint $table) {
            $table->id('idDiagnostico');
            $table->string('Vacunas', 45);
            $table->string('Examenes_Laboratorio', 45);
            $table->string('Recomendaciones', 45);
            $table->string('Plan_Seguimiento', 45);
            $table->string('Enfermedades', 45);
            $table->unsignedBigInteger('Tratamiento_idTratamiento');
            $table->timestamps();
            $table->foreign('Tratamiento_idTratamiento')->references('idTratamiento')->on('tratamiento');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico');
    }
}
