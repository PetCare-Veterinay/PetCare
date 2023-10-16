<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamiento', function (Blueprint $table) {
            $table->id('idTratamiento');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Final');
            $table->string('Nombre_tratamiento', 45);
            $table->string('Medicamento', 45);
            $table->string('Dosis', 45);
            $table->string('Duracion', 45);
            $table->integer('Costo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamiento');
    }
}
