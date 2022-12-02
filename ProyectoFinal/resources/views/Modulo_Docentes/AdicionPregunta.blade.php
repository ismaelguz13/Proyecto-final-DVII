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

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                <hr class="my-3">
            @endif

            <form action="AdicionarPreguntaDocente" method="POST" class="form-register">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2>Adición de pregunta</h2>

                    <div class="contenedor-inputs">

                        <h5>Tipo de pregunta a agregar</h5>
                        <select name="tipo_preg" id="tipoPregunta" onchange="preguntaTipo();"  class="custom-select" autofocus>

                            <option disabled selected>Ninguno seleccionado</option>
                            <option value="A">Pregunta Abierta</option>
                            <option>Pregunta Cerrada</option>

                        </select> <br><br>
                        <div id="agregarPregunta">

                        <!-- SIEMPRE ENVIARA ESTOS VALORES-->
                            <input type="hidden" name="id_encuesta" value="1">

                            <!--Este campo siempre se muestra-->
                            <b>Seccion:</b>
                            <select name="id_seccion" id="id_seccion" onchange="preguntaTipo();"  class="custom-select" required>
                                <option disabled selected>Ninguno seleccionado</option>
                                <option value="1">Seccion A: Generales profesor</option>
                                <option value="2">Seccion B: Calificar grupo</option>
                            </select> <br><br>

                            <b>Pregunta a agregar:</b>
                            <input type="text" required name="descrip_preg" placeholder="Ingrese la pregunta" class="form-control" required>


                            <!--Si es una pregunta CERRADA, se muestra este DIV-->
                            <div id="preguntaCerrada">

                            <p><b>Indique el tipo de seleccion:</b></p>
                                <!--
                                    A = Pregunta bierta
                                    CR = Seleccion con radio button (una sola seleccion)
                                    CC = Seleccion con select (seleccion multiple)
                                -->

                                <input type="radio" name="tipo_preg" value="CR" id="CR">
                                <label for="CR">Una sola selección
                                    <span class="tooltip1">?
                                    <span class="tooltiptext">El docente podra seleccionar una sola opcion</span>
                                    </span>
                                </label></br>

                                <input type="radio" name="tipo_preg" value="CC" id="CC">
                                <label for="CC">Seleccion múltiple
                                    <span class="tooltip2">?
                                    <span class="tooltiptext">El docente podra seleccionar varias opciones</span>
                                    </span>

                                </label></br>

                                <h5>Respuestas</h5>
                              <!--BOTON QUE SE ENCARGA DE AÑADIR RESPUESTA
                                mediante el onclick-->
                                <input type="text" id="resp_0" name="opcion0" class="form-control"><br>
                                <input type="text" id="resp_1" name="opcion1" class="form-control"><br>

                                <button type="button" class="btn btn-primary mb-1" id="añadirRespuesta" onclick="agregarRespuesta()">
                                    Añadir respuesta
                                </button>

                                <button type="button" class="btn btn-primary mb-1" id="añadirCampo" onclick="agregarCampo()">
                                    Añadir campo para escribir
                                </button>

                                <!--En este DIV se incertan los nuevos campos para las respuestas-->
                                <div id="respuestas"></div>

                            </div>

                            <!--Este boton siempre se ve-->
                            <input type="submit" value="Guardar" class="btn btn-primary">

                        </div>



                    </div>

                    <div class="text-center">
              <a href="{{route('MenuEncuesta')}}" class="btn btn-primary ml-4 btn-lg">Volver</a>

                    </div>
            </form>


    <script src="{{ asset('Modulo_Docentes/adicionarPregunta.js') }}"></script>

@endsection
