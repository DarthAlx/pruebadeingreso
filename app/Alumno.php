<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
  protected $table = 't_alumnos';
  protected $fillable = ['nombre', 'ap_paterno','ap_materno','activo'];
  public function calificaciones()
   {
     return $this->hasMany('App\Calificacion');
   }
}
