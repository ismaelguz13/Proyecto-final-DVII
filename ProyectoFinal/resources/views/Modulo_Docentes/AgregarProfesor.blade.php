
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

<form action="AgregarProfesor" method="POST" class="form-register">
@csrf
<h2>Registrar Profesor</h2>
<div class="contenedor-inputs">
@if ($errors->any())
                      <Div class="alert alert-danger">
                         <Ul>
                             @foreach ($errors->all() as $error)
                             <Li>{{$error}}</Li>
                             @endforeach
                         </Ul>

                      </Div>
@endif
Nombre:<input type="text" required="required" name="nombre" placeholder="Ingrese el Nombre" class="input-50" required>
Apellido:<input type="text" required="required" name="apellido" placeholder="Ingrese el apellido" class="input-50" required>
Cédula:<input type="text" required="required" name="cedula" placeholder="Ingrese la Cédula"  class="input-100" required>
Telefono:<input type="text" required="required" name="telefono" placeholder="Ingrese el Telefono" class="input-100" required>
Correo:<input type="text" required="required" name="correo" placeholder="Ingrese el Correo" class="input-100" required>

<div class="form-group col-md-6">
    <label for="inputState">Sede: </label>
    <select id="inputState" name="id_sede" class="form-control">
        <option disabled selected>Ninguno seleccionado</option>
        <option value="1">Campus Metropolitano “Dr. Víctor Levi Sasso”</option>
        <option value="2">Centro Regional de Azuero</option>
        <option value="3">Centro Regional de Bocas del Toro</option>
        <option value="4">Centro Regional de Coclé</option>
        <option value="5">Centro Regional de Colón</option>
        <option value="6">Centro Regional de Chiriquí</option>
        <option value="7">Centro Regional de Panamá Oeste</option>
        <option value="8">Centro Regional de Veraguas</option>
    </select>
  </div>


<input type="submit" value="Registrar" class="btn btn-primary ">

 </div>



</form>


    <a href="{{route('ListaProfesores')}}" class="btn btn-primary btn-lg m-4">Volver</a>


  </div>

@endsection
