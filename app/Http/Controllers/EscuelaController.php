<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\Materia;
use App\Calificacion;
use Validator;

class EscuelaController extends Controller
{
    protected function validarPost(array $data)
    {
        return Validator::make($data, [
            'materia_id' => 'required|numeric',
            'alumno_id' => 'required|numeric',
            'calificacion' => 'required|numeric'
        ]);
    }

    protected function validarPut(array $data)
    {
        return Validator::make($data, [
            'materia_id' => 'required|numeric',
            'calificacion' => 'required|numeric'
        ]);
    }
    public function store(Request $request)
    {
      $validator = $this->validarPost($request->all());

      if ($validator->fails()) {
          $this->throwValidationException(
              $request, $validator
          );
      }
      else{
        $guardar = new Calificacion($request->all());
        if ($guardar->save()) {
          return response()->json([
              'success' => 'ok',
              'msg' => 'calificacion registrada'
          ]);
        }
        else {
          return response()->json([
              'success' => 'error',
              'msg' => 'no pudo guardarse la calificacion'
          ]);
        }
      }
    }

    public function show($id)
    {
      $alumno = Alumno::findOrFail($id);
      if ($alumno) {
        foreach ($alumno->calificaciones as $calificacion) {
          $datos[]=array(
            'id_t_usuario' => $alumno->id,
            'nombre' =>  $alumno->nombre,
            'apellido' =>  $alumno->ap_paterno,
            'materia' =>  $calificacion->materia->nombre,
            'calificacion' => $calificacion->calificacion,
            'fecha_registro' => $calificacion->created_at
          );
        }
        return response()->json($datos);
      }
      else {
        return response()->json([
            'success' => 'error',
            'msg' => 'no hay calificaciones'
        ]);
      }


    }

    public function edit($id){
      $alumno = Alumno::find($id);
      $materias = Materia::all();
      $calificaciones = $alumno->calificaciones;
      if (!$calificaciones->isEmpty()) {
        return view('actualizarcalificacion', ['alumno'=>$alumno,'materias'=>$materias,'calificaciones'=>$calificaciones]);
      }
      else {
        return response()->json([
            'success' => 'error',
            'msg' => 'no hay calificaciones que editar'
        ]);
      }

    }

    public function update(Request $request, $id)
    {
      $validator = $this->validarPut($request->all());

      if ($validator->fails()) {
          $this->throwValidationException(
              $request, $validator
          );
      }
      else {
        $update = Calificacion::where('id', $id)->update(['materia_id' => $request->materia_id,'calificacion' => $request->calificacion,]);

        if ($update) {
          return response()->json([
              'success' => 'ok',
              'msg' => 'calificacion actualizada'
          ]);
        }
        else {
          return response()->json([
              'success' => 'error',
              'msg' => 'no pudo actualizar la calificacion'
          ]);
        }
      }

    }

    public function delete($id)
    {
      $alumno = Alumno::find($id);
      $calificaciones = $alumno->calificaciones;
      return view('bajacalificacion', ['alumno'=>$alumno,'calificaciones'=>$calificaciones]);
    }
     public function destroy(Request $request)
     {
       $delete = Calificacion::where('id', $request->calificacion)->delete();
         if ($delete) {
           return response()->json([
               'success' => 'ok',
               'msg' => 'calificacion borrada'
           ]);
         }
         else {
           return response()->json([
               'success' => 'error',
               'msg' => 'no pudo borrarse la calificacion'
           ]);
         }
     }
}
