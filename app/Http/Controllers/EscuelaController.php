<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\Materia;
use App\Calificacion;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (Calificacion::where('alumno_id', $id)->first()) {
        $calificaciones = Calificacion::where('alumno_id', $id)->get();
        $datos = array();
        foreach ($calificaciones as $calificacion) {
          $materia = Materia::where('materia_id', $calificacion->materia_id)->first();
          $alumno = Alumno::where('alumno_id', $calificacion->alumno_id)->first();
          $datos[]=array(
            'id_t_usuario' => $alumno->alumno_id,
            'nombre' =>  $alumno->nombre,
            'apellido' =>  $alumno->ap_paterno,
            'materia' =>  $materia->nombre,
            'calificacion' => $calificacion->calificacion,
            'fecha_registro' => $calificacion->created_at
          );
        }

        echo '' . json_encode($datos) . '';

      }
      else {
        return response()->json([
            'success' => 'error',
            'msg' => 'no hay calificaciones'
        ]);
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


      if (Calificacion::where('calificacion_id', $id)->update(['materia_id' => $request->materia_id,'alumno_id' => $request->alumno_id,'calificacion' => $request->calificacion,])) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
     {
         if (Calificacion::where('calificacion_id', $id)->delete()) {
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
