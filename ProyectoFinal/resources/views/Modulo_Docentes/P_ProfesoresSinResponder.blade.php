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

    <h1>Profesores que no han respondido la encuesta</h1>

    @if ($profesor->isEmpty())
     <h3>Todos los profesores han respondido la encuesta</h3>
    @else

    <table>

        <tr>
            <th>ID</th>
            <th>Cedula</th>
            <th>Correo</th>
            <th>Asignatura</th>
            <th>Grupo</th>
            <th>Semestre</th>
            <th>Año</th>
        </tr>
        @foreach($profesor as $profesores)

        <tr>
        <td>{!! $profesores->id_profesor !!}</td>
        <td>{!! $profesores->cedula !!}</td>
        <td>{!! $profesores->correo !!}</td>
        <td>{!! $profesores->nombre !!}</td>
        <td>{!! $profesores->cod_grupo !!}</td>
        <td>{!! $profesores->semestre !!}</td>
        <td>{!! $profesores->año !!}</td>

        </tr>
    @endforeach

    </table>
    @endif

    <div class="paginador">

    {{ $profesor->links() }}
    </div>


    <a href="{{ route('P_MenuInicial') }}" class="btn btn-primary m-4">Volver</a>



@endsection
