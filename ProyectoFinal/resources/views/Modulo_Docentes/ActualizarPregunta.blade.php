@extends('P_PantallaBase')

@section('styles')
<link rel="stylesheet" href="{{asset('Modulo_docentes/css_personal/MenuEstilos.css')}}">
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

<?php
    $i = 1;
?>

        <!---------------------------------------------------------------------------------------------------------------->
         <h1><center>Actualizar Preguntas</center></h1><br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-hover">
                        <div class="col-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                <hr class="my-3">
                            @endif
                            </div>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pregunta</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <!-- foreach para recorrer las peguntas de en la BD -->
                            @foreach ($preguntas as $pregunta)
                                <tr>
                                    <th>{{$pregunta->id_pregunta}}</th>
                                    <td>{{ $pregunta->descrip_preg }}</td>
                                    <th>
                                        <!-- En esta columna se declara un Form con botón para poder enviar el id a la
                                        página 'ActualizarPreguntaEditar' y mostrar la pregunta a actualizar -->
                                        <form action="{{route('ActualizarPreguntaEditar')}}" method="get">
                                            <button class="btn btn-primary" value="{{ $pregunta->id_pregunta}}" name="id_preg">Editar</button>
                                        </form>
                                    </th>
                                </tr>
                                <?php $i++;?>
                            @endforeach
                        </table>
                    </div>
                    {{ $preguntas->render()}}
                </div>
                <a href="{{route('MenuEncuesta')}}" class="btn btn-primary btn-lg">Volver</a>
            </div>

            <br><br>




        <!---------------------------------------------------------------------------------------------------------------->

@endsection
