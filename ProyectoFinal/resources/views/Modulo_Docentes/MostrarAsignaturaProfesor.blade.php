@extends('P_PantallaBase')

@section('styles')
<link rel="stylesheet" href="{{asset('Modulo_docentes/css_personal/MostrarProfesores.css')}}">
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

@if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                <hr class="my-3">
 @endif

 <div class="contenido">
<section id="container">
  <h1>Asignaturas del Profesor</h1>
  @if ($mostrargrupos_asignatura_profesor->isEmpty())
                  <div>No hay Mensajes</div>
              @else

  <table>
  <tr>




      <th>Grupo</th>
      <th>Asignatura</th>
      <th>Semestre</th>
      <th>Año</th>

  </tr>
  @foreach($mostrargrupos_asignatura_profesor as $mostrargrupos_asignatura_profesores)


  <tr>

  <td>{!! $mostrargrupos_asignatura_profesores->grupos !!}</td>

  <td>{!! $mostrargrupos_asignatura_profesores->asignaturas !!}</td>
  <td>{!! $mostrargrupos_asignatura_profesores->semestre !!}</td>
  <td>{!! $mostrargrupos_asignatura_profesores->año  !!}</td>




  </tr>
  @endforeach

  </table>
  @endif

  <div class="paginador">
  {{ $mostrargrupos_asignatura_profesor->links() }}
  </div>


</section>

<a href="{{ route('MostrarProfesores') }}"  class="btn btn-primary m-4">Volver</a>


 @endsection