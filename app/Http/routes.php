<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/alta-calificacion', function () {

    $alumnos = App\Alumno::all();
    $materias = App\Materia::all();
    return view('altacalificacion', ['alumnos'=>$alumnos,'materias'=>$materias]) ;
});
Route::post('alta-calificacion', 'EscuelaController@store');
Route::get('ver/{id}', 'EscuelaController@show');
Route::get('actualizar-calificacion/{id}', 'EscuelaController@edit');
Route::put('actualizar-calificacion/{id}', 'EscuelaController@update');
Route::get('baja-calificacion/{id}', 'EscuelaController@delete');
Route::delete('baja-calificacion', 'EscuelaController@destroy');
