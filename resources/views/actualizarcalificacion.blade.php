<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Prueba</title>
</head>
<body>
  @foreach ($calificaciones as $calificacion)
    <form class="" action="{{ url('/actualizando-calificacion') }}/{{ $calificacion->calificacion_id}}" method="post">
      <div class="form-group">
       <label class="col-sm-3 control-label">Materia</label>
       <div class="col-sm-9">
         <select class="form-control" name="materia_id" id="materia_id" required>
           <option value="">Selecciona una opción</option>
           @foreach ($materias as $materia)
             <option value="{{ $materia->materia_id }}">{{ $materia->nombre }}</option>
           @endforeach
         </select>
       </div>
     </div>
     <script type="text/javascript">
        document.getElementById('materia_id').value = '{!! $calificacion->materia_id !!}';
     </script>
     <div class="form-group">
      <label class="col-sm-3 control-label">Alumno</label>
      <div class="col-sm-9">
        <select class="form-control" name="alumno_id" id="alumno_id" required>
          <option value="">Selecciona una opción</option>
          @foreach ($alumnos as $alumno)
            <option value="{{ $alumno->alumno_id }}">{{ $alumno->nombre }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <script type="text/javascript">
      document.getElementById('alumno_id').value = '{!! $calificacion->alumno_id !!}';
    </script>
    <div class="form-group">
    	<label class="col-sm-3 control-label">Calificación</label>
    	<div class="col-sm-9">
    	 <input class="form-control" type="num" value="{{ $calificacion->calificacion }}" name="calificacion" required>
    	</div>
    </div>
    {!! csrf_field() !!}
    <div class="form-group">
    	<div class="col-sm-12">
    		<input class="btn btnCheckout pull-right" type="submit" value="Guardar">
    	</div>
    </div>
    </form>
  @endforeach

</body>
</html>
