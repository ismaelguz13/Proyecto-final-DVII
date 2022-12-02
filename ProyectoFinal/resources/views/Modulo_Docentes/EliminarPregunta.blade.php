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
                // Variables
                //Indice se usara como contador
                //El idPregunta se usara para captar el id que se consiga de la BD.
                $indice = 1;
                $idPregunta = -1;
            ?>
        <!---------------------------------------------------------------------------------------------------------------->
        <!-- AQUI VA CONTENIDO DE LA PAGINA-->

        @if(session('status'))
                    <script>
                        alert("La pregunta ha sido eliminada");
                    </script>
        @endif

        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
        @endif



            <h1 class="text-center">Eliminar Preguntas</h1>
            <h6  class="text-center">Click en una pregunta para ver sus respuestas</h6>
            <br>
            <br>
            <div class="alert alert-warning" role="alert">
           Eliminar una pregunta quitara todo registro de esta en la base de datos.
           La pregunta sera eliminada con todas sus respuestas relacionadas si tiene alguna.
        </div>
            <div class="container">
                <!-- ACORDEON -->
                    <div class="row">
                    <!-- Foreach para listar todas las preguntas-->
                    @foreach ($preguntas as $pregunta)
                    <!-- mientras el idPregunta ( en la primera vuelta es -1) sea diferente al
                    ID de pregnta que traigo de la BD, puedes insertar una nueva carta.
                    Esto se hace debido a que la consulta de la BD trae resultados "repetidos"-->
                    <?php if($idPregunta !== $pregunta->id_pregunta): ?>
                        <div class="col-md-12">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="heading<?php echo $indice;?>">
                                    <h3 class="mb-0">
                                        <button class="btn text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $indice;?>" aria-expanded="false" style="color:black;" aria-controls="collapse<?php echo $indice;?>" >
                                        <b># <?php echo $indice;?> </b>{{ $pregunta->descrip_preg }}

                                        <form method="post" action="EliminarPreguntaDocente"  onsubmit="return confirm('Advertencia: Eliminaras todo registro de esta pregunta en la base de datos');">
                                        @csrf

                                        <button type="submit" class="btn btn-danger float-right">Eliminar</button>
                                        <input type="hidden" name="id_pregunta" value="<?php echo $pregunta->id_pregunta;?>">

                                        </form>


                                        </button>
                                    </h3>
                                    </div>

                                    <div id="collapse<?php echo $indice;?>" class="collapse" aria-labelledby="heading<?php echo $indice;?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <!-- Ahora capturo del idPRegunta de la BD-->
                                      <?php
                                        $idPregunta = $pregunta->id_pregunta;
                                      ?>
                                      <ul>
                                      <!-- Luego verifico, si el campo de descrip_opcion es diferente a ''
                                      Si esta vacio esto significa que esta pregunta no tiene opciones.-->
                                        <?php
                                            if( $pregunta->tipo_preg <>'A'):
                                        ?>
                                        @foreach ($preguntas as $pregunta)
                                            <?php
                                                if($idPregunta == $pregunta->id_pregunta AND $pregunta->tipo_preg <>'A'):
                                            ?>
                                                </label>
                                                <div class="list-group">
                                                <a href="#!" class="list-group-item list-group-item-action">
                                                        <b>- </b>{{$pregunta->descrip_opcion}}
                                                </a>
                                                </div>
                                                <?php endif ?>
                                        @endforeach
                                        <!-- Si esta vacio muestro un input.-->
                                        <?php else: ?>
                                            <span style="color:grey;">Esta pregunta es abierta, no tiene opciones establecidas</span>
                                        <?php endif ?>
                                        </ul>

                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- aumento el indice-->
                        <?php
                            $indice++;
                        ?>
                        <?php endif ?>
                    @endforeach
                    <a href="{{route('MenuEncuesta')}}" class="btn btn-primary btn-lg m-5">Volver</a>
                    </div>
                <!-- FIN ACORDEON -->
            </div>

        <!---------------------------------------------------------------------------------------------------------------->
@endsection
