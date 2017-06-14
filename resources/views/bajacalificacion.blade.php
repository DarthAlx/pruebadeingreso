@extends('template')
@section('contenido')
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <form class="" action="{{ url('/baja-calificacion') }}" method="post">
          <div class="form-group">
           <label class="col-sm-4 control-label">Calificaciones de {{ $alumno->nombre}}</label>
           <div class="col-sm-8">
             <select class="form-control" name="calificacion" required>
               <option value="">Selecciona una opción</option>
               @foreach ($calificaciones as $calificacion)
                 <option value="{{ $calificacion->id }}">{{ $calificacion->alumno->nombre }} - {{ $calificacion->materia->nombre }} - {{ $calificacion->calificacion }}</option>
               @endforeach
             </select>
           </div>
         </div>
         {{ method_field('DELETE') }}
        {!! csrf_field() !!}
        <div class="form-group">
        	<div class="col-sm-12">
        		<input class="btn btn-primary pull-right" type="submit" value="Eliminar">
        	</div>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection
