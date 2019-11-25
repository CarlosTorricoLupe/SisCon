
@extends('layout.principal')
@section('content')
<!DOCTYPE html>
<div class="container" style="margin-top: 15px">

  <html lang="en">
  <div class="p">

  </div>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{asset('css/personalizado/style_form_conv.css')}}" rel="Stylesheet"> 
  </head>

  <body>
<div  style="padding:3%">
<h1>Requisitos</h1>


<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Indispensable</th>
            <th>Titulo</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody style="font-weight: bold">
    <label style="display:none">
    {{$requisitos=\App\Requisito::where("convocatoria_id","$requisito")->get()}}
    </label>
    @foreach($requisitos as $re)

        
        <tr>
            <td>{{$re->indispensable}}</td>
            <td>{{$re->nombre}}</td>
            <td>{{$re->descripcion}}</td>
            <td>
                <form action="{{route('requisitos.destroy', $re->id)}}" method="post" style="display:inline">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrar esta convocatoria?')">Borrar</button>
                </form>
              </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<br>



<form action="{{route('requisitos.agregar', $requisito)}}" method="get" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group col-md-4">
          <label for="fechaFin">{{'Fecha limite de entrega de requisitos'}}</label>
          <input type="date" name="fechaFin" class="form-control" id="fechaFin" value="<?php echo date('Y-m-d',strtotime(\App\convocatoria::find($requisito)->fechaLimRequisitos))?>" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
    </div>
    <br>
<hr style="border-top: 3px double #8c8b8b">
<br>
    <h2>¿Desea agregar nuevos requisitos?</h2>
    <div class="form-group col-md-6">
          <label for="Titulo">{{'Titulo del requisito'}}</label>
          <input type="text" name="Titulo" class="form-control" id="Titulo" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
    </div>
        
    <div class="form-group">
        <label for="Descripcion">{{'Descripcion'}}</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
        <div class="invalid-feedback">
            Debe llenar el campo
        </div>
    </div>
    <div class="checkbox">
        <label>
          <input type="checkbox" name="Indispensable" id="Indispensable" value="1">
          Indispensable
    </label>

      </div>
    <button type="submit" class="btn btn-success">Agregar requisito</button>
</form>


<br><br>

<form action="{{route('requerimientos.show', $requisito)}}" method="get" style="display:inline">
<button type="submit" class="btn btn-secondary btn-lg btn-block">Siguiente</button>
</form>

</div>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
  
</div>
</html>
@stop
