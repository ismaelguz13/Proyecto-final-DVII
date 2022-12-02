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

<h1>Lista de Profesores</h1>
@if ($profesor->isEmpty())
                <div>No hay registros</div>
            @else

<table>

<tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>cedula</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Centro Regional</th>
    <th>Insertar Asignaturas</th>
    <th>Mostrar Asignaturas</th>
</tr>
@foreach($profesor as $profesores)


<tr>
    <td>{!! $profesores->nombre !!}</td>
    <td>{!! $profesores->apellido !!}</td>
    <td>{!! $profesores->cedula !!}</td>
    <td>{!! $profesores->telefono !!}</td>
    <td>{!! $profesores->correo !!}</td>
    <td>{!! $profesores->sedenombre  !!}</td>
    <td>

      <form action="{{route('IngresarAsignaturaProfesor')}}" method="GET">
        <button class="btn btn-primary"   value="{{ $profesores->id_profesor}}" name="id_profesor">
          Insertar Asignaturas
        </button>
      </form>
    </td>

    <td>
      <form action="{{ action('Modulo_Docentes\C_MostrarAsignaturaProfesor@Store') }}" method="GET" class="form-register">
        @csrf
        <input type="hidden" name ="id_profesor" value="{{ $profesores->id_profesor}}">
        <button class="btn btn-primary">Mostrar Asignaturas</button>
     </form>
    </td>

</tr>
@endforeach

</table>
@endif

<div class="paginador">

{{ $profesor->links() }}
</div>

</section>


    <a href="{{ route('ListaProfesores') }}" class="btn btn-primary m-4">Volver</a>



    <a href="{{ route('AgregarProfesor') }}" class="btn btn-primary m-4 float-right">Registrar Profesores</a>



</div>

@endsection
