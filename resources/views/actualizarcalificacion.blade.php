@extends('template')
@section('contenido')
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        @if (count($errors)>0)
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
        @foreach ($calificaciones as $calificacion)
          <form class="" action="{{ url('/actualizar-calificacion') }}/{{ $calificacion->id}}" method="post">
            {{ method_field('PUT') }}
            <h2>{{ $calificacion->id }} - Calificación de  {{ $alumno->nombre}}</h2>
            <div class="form-group">
             <label class="col-sm-4 control-label">Materia</label>
             <div class="col-sm-8">
               <select class="form-control" name="materia_id" id="materia_id{{ $calificacion->id}}" required>
                 <option value="">Selecciona una opción</option>
                 @foreach ($materias as $materia)
                   <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <script type="text/javascript">
              document.getElementById('materia_id{{ $calificacion->id}}').value = '{!! $calificacion->materia_id !!}';
           </script>
          <div class="form-group">
          	<label class="col-sm-4 control-label">Calificación</label>
          	<div class="col-sm-8">
          	 <input class="form-control" type="num" value="{{ $calificacion->calificacion }}" name="calificacion" required>
          	</div>
          </div>
          {!! csrf_field() !!}
          <div class="form-group">
          	<div class="col-sm-12">
          		<input class="btn btn-primary pull-right" type="submit" value="Actualizar">
          	</div>
          </div>
          </form>
        @endforeach
      </div>
    </div>
  </div>


@endsection
