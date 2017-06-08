<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
  protected $table = 't_materias';
  protected $fillable = ['nombre', 'activo'];
  public function calificaciones()
     {
       return $this->hasMany('App\Calificacion');
     }
}
