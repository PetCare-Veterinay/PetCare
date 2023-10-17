<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->string('Vacunas', 45);
            $table->string('Examenes_Laboratorio', 45);
            $table->string('Recomendaciones', 45);
            $table->string('Plan_Seguimiento', 45);
            $table->string('Enfermedades', 45);
            $table->unsignedBigInteger('idTratamiento');
            $table->timestamps();
            $table->foreign('idTratamiento')->references('id')->on('tratamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosticos');
    }
}
