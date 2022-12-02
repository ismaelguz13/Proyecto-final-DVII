@extends('P_PantallaEncuesta')

@section('navbar')
<span class="text-white">DOCENTE</span>
@endsection

@section('content')



    <?php
    // Variables
    //Indice se usara como contador
    //El idPregunta se usara para captar el id que se consiga de la BD.
    $indice = 1;
    $idPregunta = -1;
    ?>
    <div class="container">

        <h2 class="text-center">Encuesta a Docentes</h2>

        <div class="m-3"><h5># &nbsp&nbsp&nbsp&nbsp Pregunta</h5></div>
        <hr>
        @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                <hr class="my-3">
        @endif

        <form method="POST" action="EncuestaGuardado">
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
            <!--PREGUNTAS-->
            @foreach ($preguntas as $pregunta)
                <!--ID DEL USUARIO-->
                <input type="hidden" name="<?php echo $indice;?>[id_usuario]" value="<?php echo $id_usuario?>">
                <!--ID DE ENCUESTA-->
                <input type="hidden" name="<?php echo $indice;?>[id_encuesta]" value="1">

                    <?php if($idPregunta !== $pregunta->id_pregunta): ?>

                        <div class="shadow-sm p-3 mb-3 bg-white rounded">
                        <!-- Ahora capturo del idPRegunta de la BD-->
                        <?php
                        $idPregunta = $pregunta->id_pregunta;
                        ?>
                        <!--ID DE SECCION -->
                        <input type="hidden" name="<?php echo $indice;?>[id_seccion]" value="<?php echo $pregunta->id_seccion?>">
                        <!--ID DE PREGUNTA -->
                        <input type="hidden" name="<?php echo $indice;?>[id_pregunta]" value="<?php echo $idPregunta?>">

                        <b><?php echo $indice;?> &nbsp&nbsp&nbsp {{ $pregunta->descrip_preg }}</b>
                        <!-- Validacion de si es abierta o cerrada-->
                        <?php
                        if( $pregunta->tipo_preg <>'A'):
                            $indice2 = 0;
                        ?>
                        <!--PREGUNTA CERRADA -->
                        <!-- Tipo de respuesta-->
                        <input type="hidden" name="<?php echo $indice;?>[tipo_resp]" value="cerrado">
                        <br><span>Seleccione al menos una opcion</span>
                            @foreach ($preguntas as $pregunta)
                                <!--OPCIONES DE PREGUNTAS-->
                                <?php
                                if($idPregunta == $pregunta->id_pregunta AND $pregunta->tipo_preg <>'A'):
                                ?>
                                    <div class="form-check">

                                        @if($pregunta->descrip_opcion == "Otros escriba")
                                        <!--Tiene un campo para escribir -->
                                        {{$pregunta->descrip_opcion}} <?php $idPregunta?>
                                        <input type="text" class="form-control" name="<?php echo $indice;?>[respuesta]" value=" ">
                                        <input type="hidden" name="<?php echo $indice;?>[id_opcion_escribir]" value="{{$pregunta->id_opcion}}">
                                        <input type="hidden" value="{{$pregunta->id_opcion}}" name="<?php echo $indice;?>[id_opcion<?php echo $indice2;?>]">

                                        @else
                                            <!--Es CHECK o RADIO BUTTON -->
                                            @if($pregunta->tipo_preg == "CR")
                                                <!--RADIO BUTTON -->
                                                <input value="{{$pregunta->id_opcion}}" name="<?php echo $indice;?>[id_opcion0]" type="radio" id="radio<?php echo $indice2;?>">
                                                <label class="form-check-label" for="radio<?php echo $indice2;?>">
                                                    {{$pregunta->descrip_opcion}} <?php $idPregunta?>
                                                </label>

                                            @else
                                                <!--CHECKBOX -->
                                                <input value="{{$pregunta->id_opcion}}" name="<?php echo $indice;?>[id_opcion<?php echo $indice2;?>]" class="form-check-input" type="checkbox" id="defaultCheck<?php echo $indice2;?>">

                                                <label class="form-check-label" for="defaultCheck<?php echo $indice2;?>">
                                                    {{$pregunta->descrip_opcion}} <?php $idPregunta?>
                                                </label>

                                            @endif

                                        @endif

                                    </div>
                                <?php
                                    $indice2++;
                                endif ?>
                            @endforeach
                            <!--Cant de opciones-->
                            <input type="hidden" name="<?php echo $indice;?>[cant_opciones]" value="<?php echo $indice2;?>">

                            <!-- Si esta vacio muestro un input.-->
                        <?php else: ?>
                            <!-- Tipo de respuesta-->
                                <input type="hidden" name="<?php echo $indice;?>[tipo_resp]" value="abierta">
                                <!--ID DE SECCION -->
                                <input type="hidden" name="<?php echo $indice;?>[id_opcion0]" value="">
                                <!--CAMPO PARA RESPONDER-->
                                <input type="text" class="form-control" name="<?php echo $indice;?>[descrip_resp]" required>
                        <?php endif ?>

                            <!--ID DE ASIGNATURA-->
                            <input type="hidden" name="<?php echo $indice;?>[id_asignatura]" value="<?php echo  $id_asignatura ?>">
                            <!--ID DE GRUPO-->
                            <input type="hidden" name="<?php echo $indice;?>[id_grupo]" value="<?php echo $id_grupo?>">
                            <!--SEMESTRE-->
                            <input type="hidden" name="<?php echo $indice;?>[semestre]" value="<?php echo  $semestre ?>">
                        <?php
                            $indice++;
                        ?>
                        </div>
                    <?php endif ?>

            @endforeach


            <?php $indice--;?>
            <!--SEMESTRE-->
            <input type="hidden" name="cantidad" value="<?php echo  $indice ?>">
            <a href="{{route('profesor')}}" class="btn btn-success w-25 p-1 mb-5">Volver</a>
            <input type="submit" value="Enviar" class="btn btn-success w-25 p-1 mb-5 ">
        </form>



    </div>

@endsection
