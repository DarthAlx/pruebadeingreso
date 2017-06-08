<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('t_calificaciones', function (Blueprint $table) {
          $table->increments('calificacion_id');
          $table->integer('alumno_id');
          $table->integer('materia_id');
          $table->decimal('calificacion', 10, 2);
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
        Schema::drop('t_calificaciones');
    }
}
