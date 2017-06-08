<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
  protected $table = 't_calificaciones';
  protected $fillable = ['materia_id', 'alumno_id','calificacion'];
  public function materia()
     {
       return $this->belongsTo('App\Materia');
     }
   public function alumno()
      {
        return $this->belongsTo('App\Alumno');
      }
}
