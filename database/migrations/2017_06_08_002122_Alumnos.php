<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('t_alumnos', function (Blueprint $table) {
          $table->increments('alumno_id');
          $table->string('nombre',80);
          $table->string('ap_paterno', 80);
          $table->string('ap_materno', 80);
          $table->boolean('activo');
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
      Schema::drop('t_alumnos');
    }
}
