@extends('P_PantallaBase')

@section('styles')
<link rel="stylesheet" href="{{asset('Modulo_docentes/css_personal/AdicionPregunta.css')}}">
@endsection

@section('nav')
<li class="nav-item dropdown" style="margin-left: 20px; margin-top:-5px;">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>MANTENIMIENTO</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{route('MenuEncuesta')}}">Menu Inicial</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('ActualizarPreguntaDocente')}}">Actualizar pregunta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('AdicionarPreguntaDocente')}}">Añadir pregunta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('EliminarPreguntaDocente')}}">Eliminar pregunta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('AgregarProfesor')}}">Agregar Docente</a>
        </div>
      </li>

      <li class="nav-item dropdown" style="margin-left: 20px; margin-top:-5px;">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <b> CONSULTAS</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{route('P_MenuInicial')}}">Menu Inicial</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('MostrarProfesores')}}#">Lista de docentes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('P_ProfesoresRespondido')}}">Docentes que han contestado encuesta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('P_ProfesoresSinResponder')}}">Docentes que no han contestado encuesta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('ConsultarPreguntasDocente')}}">Consultar Preguntas</a>
        </div>
      </li>
@endsection

@section('secciones')
<div class="mt-5">

<form action="IngresarAsignaturaProf" method="POST" class="form-register">
@csrf
<h2>Registrar Asignaturas y Grupos</h2>
<div class="contenedor-inputs">
<div style=" font-size:15px; width: 100%; text-align:center;">Seleccione el Grupo, Asignatura, semestre e indique el año.</div>
@if ($errors->any())
                      <Div class="alert alert-danger">
                         <Ul>
                             @foreach ($errors->all() as $error)
                             <Li>{{$error}}</Li>
                             @endforeach
                         </Ul>

                      </Div>
@endif

<div class="form-group col-md-4">
    <label for="inputState">Grupos: </label>
    <select id="inputState" name="id_grupo" class="form-control">
    <option disabled selected>Ninguno seleccionado</option>
    @foreach ($grupos as $grupo)
                              <option value="{{$grupo->id_grupo}}" name="">
                                  {{$grupo->cod_grupo}}
                                </option>
                              @endforeach
                              </select>
  </div>

  <div class="form-group col-md-4">
    <label for="inputState">Asignaturas: </label>
    <select id="inputState" name="id_asignatura" class="form-control">
    <option disabled selected>Ninguno seleccionado</option>
    @foreach ($asignaturas as $asignatura)
                              <option value="{{$asignatura->id_asignatura}}" name="">
                                  [{{$asignatura->cod_asignatura}}] {{$asignatura->nombre}}
                                </option>
                              @endforeach

    </select>
  </div>

<div class="form-group col-md-4">
    <label for="inputState">Semestre: </label>
    <select id="inputState" name="semestre" class="form-control">
    <option disabled selected>Ninguno seleccionado</option>
        <option value="I Semestre">I Semestre</option>
        <option value="II Semestre">II Semestre</option>

    </select>
  </div>
  Año:<input type="text" required="required" name="año" placeholder="Ingrese el año"  class="input-50" required>

<input type="hidden" name ="id_profesor" value="<?php echo $_GET['id_profesor']?>">
<input type="submit" value="Insertar Datos"  class="btn-enviar">


 </div>



</form>

    <a href="{{ route('MostrarProfesores') }}"  class="btn btn-primary m-4">Volver</a>

</div>


@endsection
