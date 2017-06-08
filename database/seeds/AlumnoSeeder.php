<?php

use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Alumno::class)->create(
      [
        'nombre'=>'John',
        'ap_paterno'=>'Dow',
        'ap_materno'=>'Down',
        'activo' =>1
      ]
    );
    }
}
