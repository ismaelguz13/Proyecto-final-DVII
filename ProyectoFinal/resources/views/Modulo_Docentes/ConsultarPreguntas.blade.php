
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


        <h1 class="text-center">Consulta de Preguntas</h1>
        <br>

                <div class="container">

                    <div class="row">
                    <!-- Foreach para listar todas las preguntas-->
                    @foreach ($preguntas as $pregunta)
                    <!-- mientras el idPregunta ( en la primera vuelta es -1) sea diferente al
                    ID de pregnta que traigo de la BD, puedes insertar una nueva carta.
                    Esto se hace debido a que la consulta de la BD trae resultados "repetidos"-->
                    <?php if($idPregunta !== $pregunta->id_pregunta): ?>
                        <hr style="width: 100%;">
                        <div class="col-md-10">

                                    <h5 class="mb-0">
                                        <b><?php echo $indice;?>.&nbsp&nbsp&nbsp</b>{{ $pregunta->descrip_preg }}

                                    </h5>
                                    <!-- Ahora capturo del idPRegunta de la BD-->
                                      <?php
                                        $idPregunta = $pregunta->id_pregunta;
                                      ?>
                                      <ul>
                                      <!-- Luego verifico, si el campo de descrip_opcion es diferente a ''
                                      Si esta vacio esto significa que esta pregunta no tiene opciones.-->
                                        <?php
                                            if( $pregunta->tipo_preg <> 'A'):
                                        ?>
                                        @foreach ($preguntas as $pregunta)
                                            <?php
                                                if($idPregunta == $pregunta->id_pregunta AND $pregunta->tipo_preg <> 'A'):
                                            ?>
                                                </label>
                                                <div class="list-group">
                                                        - {{$pregunta->descrip_opcion}}
                                                </div>
                                                <?php endif ?>
                                        @endforeach
                                        <!-- Si esta vacio muestro un input.-->
                                        <?php else: ?>
                                            <span style="color:grey;">Esta pregunta es abierta, no tiene opciones establecidas</span>
                                        <?php endif ?>
                                        </ul>

                        </div>
                        <!-- aumento el indice-->
                        <?php
                            $indice++;
                        ?>
                        <?php endif ?>

                    @endforeach

                    </div>
                </div>
                <a href="{{route('MenuEncuesta')}}" class="btn btn-primary btn-lg m-5">Volver</a>


@endsection
