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
        <form class="" action="{{ url('/alta-calificacion') }}" method="post">
          <div class="form-group">
           <label class="col-sm-4 control-label">Materia</label>
           <div class="col-sm-8">
             <select class="form-control" name="materia_id" required>
               <option value="">Selecciona una opción</option>
               @foreach ($materias as $materia)
                 <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
               @endforeach
             </select>
           </div>
         </div>
         <div class="form-group">
          <label class="col-sm-4 control-label">Alumno</label>
          <div class="col-sm-8">
            <select class="form-control" name="alumno_id" required>
              <option value="">Selecciona una opción</option>
              @foreach ($alumnos as $alumno)
                <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-4 control-label">Calificación</label>
        	<div class="col-sm-8">
        	 <input class="form-control" type="num" value="{{ old('calificacion')}}" name="calificacion" required>
        	</div>
        </div>
        {!! csrf_field() !!}
        <div class="form-group">
        	<div class="col-sm-12">
        		<input class="btn btnCheckout pull-right" type="submit" value="Guardar">
        	</div>
        </div>
        </form>
      @endsection
      </div>
    </div>
  </div>
