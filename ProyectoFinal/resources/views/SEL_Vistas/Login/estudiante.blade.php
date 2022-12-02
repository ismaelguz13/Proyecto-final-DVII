@extends('layouts.encuesta')

@section('navbar')
<a class="navbar-brand" style="color: #fff" href="#"> ESTUDIANTE </a>
@endsection

@section('seccion')
    <li class="nav-item mr-4">
      <a class="navbar-link anav" href="#SeccionA" > SECCION A </a>
    </li>
    <div Style="width: 50px;"></div>
    <li class="nav-item mr-4">
      <a class="navbar-link anav" href="#SeccionB" > SECCION B </a>
    </li>
    <div style="width: 50px;"></div>
    <li class="nav-item mr-4">
      <a class="navbar-link anav" href="#SeccionC" > SECCION C </a>
    </li>
    <div Style="width: 50px;"></div>
    <li class="nav-item mr-4">
      <a class="navbar-link anav" href="#SeccionD" > SECCION D </a>
    </li>
    <div Style="width: 50px;"></div>
  @endsection

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
<hr class="my-3">
@endif

<form action="/respuesta" method="post">
    @csrf

    @if(session('success'))
        <br>
        <div class="alert alert-success">
            {{session('success') }}
        </div>
    @endif

    @if(session('error'))
        <br>
        <div class="alert alert-danger">
            {{session('error') }}
        </div>
    @endif

    <H2 id="SeccionA">Información General</H2>

    @foreach($preguntas as $pregunta) 
    @if ($pregunta->id_encuesta == 2 && $pregunta->id_seccion == 3)
      <div class="form-group">
        <label for="{{$pregunta->id_pregunta}}">{{$pregunta->descrip_preg}}</label>
        @foreach($opciones as $opcion)
        @if($pregunta->id_pregunta == $opcion->id_pregunta)

        @if($pregunta->tipo_preg == 'A')
        <span>{{$opcion->descrip_opcion}}</span>
        <input type="text" class="form-control"  name="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" size="50" maxlength="400" required>

        @elseif ($pregunta->tipo_preg == 'CR')
        <div class="form-check">
            <input type="radio" name="{{$pregunta->id_pregunta}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}" required>
            <label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label>
        </div>
        @elseif ($pregunta->tipo_preg == 'CC')
        <div class="form-check">
            <input type="checkbox" name="{{$opcion->id_pregunta}}_{{$opcion->id_opcion}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}">
            <label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label>
        </div>
        @endif
        @endif

        @endforeach
    </div>
    @endif
    @endforeach

    <H2 id="SeccionB">Sobre la Asignatura</H2>

    @foreach($preguntas as $pregunta)
    @if ($pregunta->id_encuesta == 2 && $pregunta->id_seccion == 4)
      <div class="form-group">
        <label for="{{$pregunta->id_pregunta}}">{{$pregunta->descrip_preg}}</label>
        @foreach($opciones as $opcion)
        @if($pregunta->id_pregunta == $opcion->id_pregunta)

        @if($pregunta->tipo_preg == 'A')
        <span>{{$opcion->descrip_opcion}}</span>
        <input type="text" class="form-control"  name="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" size="50" maxlength="400" required>

        @elseif ($pregunta->tipo_preg == 'CR')
        <div class="form-check">
            <input type="radio" name="{{$pregunta->id_pregunta}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}" required>
            <label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label>
        </div>
        @elseif ($pregunta->tipo_preg == 'CC')
        <div class="form-check">
            <input type="checkbox" name="{{$opcion->id_pregunta}}_{{$opcion->id_opcion}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}">
            <label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label>
        </div>
        @endif
        @endif

        @endforeach
    </div>
    @endif
    @endforeach

    <H2 id="SeccionC">Evaluaciones Realizadas</H2>

    <h6>Introduzca un valor mínimo</h6>

    @foreach($preguntas as $pregunta)
    @if ($pregunta->id_encuesta == 2 && $pregunta->id_seccion == 5)
      <div class="form-group">
        <label for="{{$pregunta->id_pregunta}}">{{$pregunta->descrip_preg}}</label><br>
        @foreach($opciones as $opcion)
        @if($pregunta->id_pregunta == $opcion->id_pregunta)

        @if($pregunta->tipo_preg == 'A')
        <span>{{$opcion->descrip_opcion}}</span>
        <input type="number" class="form-control"  name="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" size="50" min="0" maxlength="400" required>

        @elseif ($pregunta->tipo_preg == 'CR')
        <div class="form-check">
            <input type="radio" name="{{$pregunta->id_pregunta}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}" required>
            <label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label>
        </div>
        @elseif ($pregunta->tipo_preg == 'CC')
        <div class="form-check">
            <input type="checkbox" name="{{$opcion->id_pregunta}}_{{$opcion->id_opcion}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}">
            <label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label>
        </div>
        @endif
        @endif

        @endforeach
    </div>
    @endif
    @endforeach

    <H2 id="SeccionD">Servicios Académicos</H2>

    <h6>Estimado estudiante: Esta sección nos permitirá medir el grado de satisfacción del estudiantado de la Facultad de Ingeniería en Sistemas computacionales en relación a los servicios académicos que prestamos.</h6>

    @foreach($preguntas as $pregunta)
    @if ($pregunta->id_encuesta == 2 && $pregunta->id_seccion == 6)
      <div class="form-group">
        <label for="{{$pregunta->id_pregunta}}">{{$pregunta->descrip_preg}}</label>
        @foreach($opciones as $opcion)
        @if($pregunta->id_pregunta == $opcion->id_pregunta)

        @if($pregunta->tipo_preg == 'A')
        <span>{{$opcion->descrip_opcion}}</span>
        <input type="text" class="form-control"  name="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" size="50" maxlength="400" required>

        @elseif ($pregunta->tipo_preg == 'CR')
        <div class="form-check">
        <table class="table table-borderless" style="table-layout: fixed; width: 100%;">
        @if($opcion->id_opcion == 366 || $opcion->id_opcion == 376)
        <tr>
            <th scope="col" style="table-layout: fixed; width: 40%;"></th>
            <th scope="col" style="table-layout: fixed; width: 5%;">1</th>
            <th scope="col" style="table-layout: fixed; width: 5%;">2</th>
            <th scope="col" style="table-layout: fixed; width: 5%;">3</th>
            <th scope="col" style="table-layout: fixed; width: 5%;">4</th>
            <th scope="col" style="table-layout: fixed; width: 5%;">5</th>
          </tr>
          <tbody>
        @endif
        
          <tr>
            <th scope="row" style="table-layout: fixed; width: 40%;"><label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label></th>
            @for ($i =1; $i <= 5; $i++)
            <td style="table-layout: fixed; width: 5%;"><input type="radio" name="{{$pregunta->id_pregunta}}_{{$opcion->id_opcion}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}_{{$i}}" required></td>
            @endfor
          </tr>

          @if($opcion->id_opcion == 374 || $opcion->id_opcion == 384)
          </tbody>
        </table>
        @endif
        </div>
        @elseif ($pregunta->tipo_preg == 'CC')
        <div class="form-check">
            <input type="checkbox" name="{{$opcion->id_pregunta}}_{{$opcion->id_opcion}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}">
            <label for="opciones{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</label>
        </div>
        @endif
        @endif

        @endforeach
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
        <a href="/login" class="btn btn-success">Cancelar</a>
        <button type="submit" class="btn btn-success">Terminar Encuesta</button>
        </div>
    </div>
</form>
@endsection