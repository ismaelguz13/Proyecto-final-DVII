
@extends('P_PantallaBase')

@section('styles')
<link rel="stylesheet" href="{{asset('Modulo_docentes/css_personal/MenuEncuesta.css')}}">
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


<h1 class="tit1" style="margin-left:-25%;">Modulo de Encuesta a Docentes</h1>
<h3 class="tit1" style="margin-left:-25%;">Seleccione una Opción</h3>

<div class="container">


    <div class="row" style="margin:0;">
         <div class="col-md-6 mb-4">
             <div class="card shadow">
                 <div class="inner">
                     <image img src="/Modulo_Docentes/css_personal/Imagenes_menu/act3.png"  class="card-img-top" alt="..."></image>
                    </div>
                    <div class="centrado">
                        <h6 class="card-title">Actualización de Preguntas</h6>
                        <a href="{{route('ActualizarPreguntaDocente')}}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
            <!---------finalactualizacionpreguntas------>


            <!---------inicioadicionpreguntas------>
            <div class="col-md-6 mb-4">
               <div class="card shadow">
                    <div class="inner">
                        <image img src="/Modulo_Docentes/css_personal/Imagenes_menu/agregar.png"  class="card-img-top" alt="..."></image>
                    </div>
                    <div class="centrado">
                        <h6 class="card-title">Adición de Preguntas</h6>
                        <a href="{{route('AdicionarPreguntaDocente')}}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
            <!---------finaladicionpreguntas------>

            <!---->
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="inner">
                        <image img src="/Modulo_Docentes/css_personal/Imagenes_menu/eliminar.png"  class="card-img-top" alt="..."></image>
                    </div>
                    <div class="centrado">
                        <h6 class="card-title">Eliminación de Preguntas</h6>
                        <a href="{{route('EliminarPreguntaDocente')}}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
                <!---->

                <!---->
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="inner4">
                        <image img  src="/Modulo_Docentes/css_personal/Imagenes_menu/consulta.png"  class="card-img-top" alt="..."></image>
                    </div>
                    <div class="centrado">
                        <h6 class="card-title">Consultas de Preguntas</h6>
                        <a href="{{route('ConsultarPreguntasDocente')}}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="inner5">
                        <image img  src="/Modulo_Docentes/css_personal/Imagenes_menu/list.png"  class="card-img-top" alt="..."></image>
                    </div>
                    <div class="centrado">
                        <h6 class="card-title">Lista de profesores</h6>
                        <a href="{{route('ListaProfesores')}}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>

            <!--->
        </div>
        <!---------------------------------------------------------------------------------------------------------------->

        <a href="{{route('P_MenuInicial')}}" class="btn btn-primary btn-lg m-4">Volver</a>

    </div>

    </div>

@endsection

