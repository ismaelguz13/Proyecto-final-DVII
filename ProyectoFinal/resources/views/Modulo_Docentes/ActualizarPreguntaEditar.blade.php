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
<!-- La variable $id recibe lo enviado desde la pantalla 'ActualizarPregunta' -->
<?php
    $id = $id_preg;
    /* La variable $aux con tiene el registro, que se quiere mostrar, esto igualandolo
    al $id enviado desde la pantalla 'ActualizarPregunta' */
    foreach($preguntas as $pregunta){
        if($pregunta->id_pregunta == $id){
            $aux = $pregunta;
        }
    }
    $indice = 0;
?>

<h1>Actualizar Preguntas</h1><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                <div class="row">
                    <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        <hr class="my-3">
                    @endif
                    </div>
                    <thead>
                        <form action="{{route('ActualizarPreguntaEditar')}}" onsubmit="return confirm('Advertencia: ¿Estás seguro que quieres guardar los cambios realizados?');" method="post">
                            @csrf
                            <div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- Se muestra el ID de la pregunta a actualizar -->
                                <h5>Pregunta a actualizar</h5>
                                <input type="text" class="form-control" value="{{ $aux->descrip_preg }}" name="descrip_preg" placeholder="Editar...">
                            </div>
                            <div class="float-right">
                                <button class="btn btn-primary" value="{{ $aux->id_pregunta}}" name="id_preg">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </form>
                            <!-- Se valida si el tipo de pregunta es abierta o cerrada -->
                            @if(substr($aux->tipo_preg,0,1) == "C")
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed table-hover">
                                    <thead>
                                    <tr>
                                        <th>Respuestas definidas para la pregunta</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <!-- Se hace un recorrido para asignar las respuestas definidas para esa pregunta -->
                                    @foreach ($preguntas as $pregunta)
                                        @if($pregunta->id_pregunta == $id)
                                            <?php $aux = $pregunta; $indice++?>
                                            <!-- Se asigna un id al row -->
                                            <tr id="<?php echo "resp_".$indice;?>">
                                                <!-- Se valida si las respuestas de las preguntas cerradas contienen un campo
                                                final para ingresar una respuesta por teclado -->
                                                <form action="{{route('ActualizarPreguntaEditar')}}" method="post" onsubmit="return confirm('Advertencia: ¿Estás seguro que quieres guardar los cambios realizados?');">
                                                    <!-- Se envian 2 valores que se necesitan para validar -->
                                                    <input type="hidden" value="{{ $aux->id_pregunta}}" name="id_preg">
                                                    <input type="hidden" value="{{ $aux->id_pregunta }}" name="aux">
                                                    @csrf
                                                    <!-- Se valida si las respuestas definidas contienen un "Otros escriba" -->
                                                    @if($aux->descrip_opcion == "Otros escriba")
                                                    <td><input type="text" class="form-control" disabled placeholder="Otros escriba..."></td>
                                                    <td class="d-flex justify-content-center"><button class="btn btn-danger" value="{{ $aux->id_opcion }}" name="eliminar">Eliminar</button></td>
                                                    @elseif($aux->descrip_opcion != null)
                                                        <td><input type="text" class="form-control" value="{{ $aux->descrip_opcion }}" name="editar" placeholder="Editar..."></td>
                                                        <td class="d-flex justify-content-center">
                                                            <button class="btn btn-info">Editar
                                                                <input type="hidden" value="{{ $aux->id_opcion }}" name="valor">
                                                            </button>&nbsp;
                                                            <!-- valido si ya no hay respuestas para la pregunta, si es así, no muestro
                                                            el botón eliminar -->
                                                            @if($aux->descrip_opcion != null)
                                                                <button class="btn btn-danger" value="{{ $aux->id_opcion }}" name="eliminar">Eliminar</button>
                                                            @endif
                                                        </td>
                                                    @endif
                                                </form>
                                            </tr>
                                        @endif
                                    @endforeach

                                    <!-- Este formulario traba la parte de añadir una respuesta definida
                                    para las preguntas cerradas -->
                                    <form action="{{route('ActualizarPreguntaEditar')}}" method="post" onsubmit="return confirm('Advertencia: ¿Estás seguro que quieres guardar los cambios realizados?');">
                                    <!-- Se envian estos 2 valores porque son necesarios para la lógica
                                    en el controlador -->
                                    <input type="hidden" value="{{ $aux->id_pregunta }}" name="aux">
                                    <input type="hidden" value="{{ $aux->id_pregunta}}" name="id_preg">
                                    @csrf
                                        <td><input type="text" class="form-control" value="" name="agregar" placeholder="Editar..."></td>
                                        <td class="d-flex justify-content-center">
                                            <button class="btn btn-info">Añadir</button>&nbsp;
                                        </td>
                                    </form>

                                </table>
                            </div>
                            @else
                            <br><br>
                            <div class="alert alert-warning" role="alert">
                                <h5>Pregunta de tipo 'Abierta'</h5>
                                <h8>Las preguntas de tipo abierta no contienen opciones.</h8>
                            </div>
                            @endif
                    </thead>
                    <!--
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary"onclick="anadirResp($indice+1)">Añadir</button>
                    </div>
                    -->
                </table>
            </div>

            <br>
            <div class="d-flex justify-content-between">
                <a href="{{route('ActualizarPreguntaDocente')}}" class="btn btn-primary btn-lg mb-4">Volver</a>
            </div>

        </div>

    </div>
    </div>
    <script src="{{ asset('Modulo_Docentes/adicionarPregunta.js') }}"></script>

@endsection
