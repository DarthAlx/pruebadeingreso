<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Prueba</title>
</head>
<body>
  <form class="" action="{{ url('/alta-calificacion') }}" method="post">
    <div class="form-group">
     <label class="col-sm-3 control-label">Materia</label>
     <div class="col-sm-9">
       <select class="form-control" name="materia_id" required>
         <option value="">Selecciona una opción</option>
         @foreach ($materias as $materia)
           <option value="{{ $materia->materia_id }}">{{ $materia->nombre }}</option>
         @endforeach
       </select>
     </div>
   </div>
   <div class="form-group">
    <label class="col-sm-3 control-label">Alumno</label>
    <div class="col-sm-9">
      <select class="form-control" name="alumno_id" required>
        <option value="">Selecciona una opción</option>
        @foreach ($alumnos as $alumno)
          <option value="{{ $alumno->alumno_id }}">{{ $alumno->nombre }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
  	<label class="col-sm-3 control-label">Calificación</label>
  	<div class="col-sm-9">
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
</body>
</html>
