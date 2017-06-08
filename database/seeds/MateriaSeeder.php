<?php

use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Materia::class)->create(
      [
        'nombre'=>'matematicas',
        'activo'=>1
      ]
    );
    factory(App\Materia::class)->create(
    [
      'nombre'=>'programacion I',
      'activo'=>1
    ]
  );
  factory(App\Materia::class)->create(
  [
    'nombre'=>'ingenieria de software',
    'activo'=>1
  ]
);
    }
}
