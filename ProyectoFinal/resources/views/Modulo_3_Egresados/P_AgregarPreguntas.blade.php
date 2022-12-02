@extends('layouts.admin')
@section('styles')
<style>
    .btn-color {
        border-color:  ##005B28 !important;
        background-color:  #005B28 !important;
    }

    .btn-color:hover {
        background-color: rgba(0, 91, 40, 0.8) !important;
    }
</style>
@endsection
@section('navprin')
<nav class="navbar navbar-expand-sm  navbar-expand-md navbar-expand-lg d-flex justify-content-start navbar-light" style="font-family: Pill Gothic 600mg Semibd, sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-link anav" href="/menuvice/mantenimiento"><img style="width: 25px; height: 25px;" src="{{asset('/icons/regreso.svg')}}" alt="home SVG"> Volver</a>
      </li>
    </ul>
  </nav><br>
  @endsection

@section('content')

<!--Titulo de la patalla -->
<div class="row" >
    <div style="width:15px;"></div>
    <div class="col">
        <h5>Adición de pregunta</h5>
        <hr style="border: 3px solid green;width:350px;margin-left:0%;">
    </div>
</div>
<div class="container">

@if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                <hr class="my-3">
            @endif

            <form action="/AgregarPreguntas" method="POST" class="form-register">
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


                    <div class="contenedor-inputs">

                        <h5>Tipo de pregunta a agregar</h5>
                        <select name="tipo_preg" id="tipoPregunta" onchange="preguntaTipo();"  class="custom-select" autofocus>

                            <option disabled selected>Ninguno seleccionado</option>
                            <option value="A">Pregunta Abierta</option>
                            <option>Pregunta Cerrada</option>

                        </select> <br><br>
                        <div id="agregarPregunta">

                        <!-- SIEMPRE ENVIARA ESTOS VALORES-->
                            <input type="hidden" name="id_encuesta" value="3">

                            <!--Este campo siempre se muestra-->
                            <b>Seccion:</b>
                            <select name="id_seccion" id="id_seccion" onchange="preguntaTipo();"  class="custom-select" required>
                                <option disabled selected>Ninguno seleccionado</option>
                                <option value="7">Seccion A: Generales Demográficos</option>
                                <option value="8">Seccion B: Generales de Contacto</option>
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
                                    <span class="tooltiptext">El Egresado podra seleccionar una sola opcion</span>
                                    </span>
                                </label></br>

                                <input type="radio" name="tipo_preg" value="CC" id="CC">
                                <label for="CC">Seleccion múltiple
                                    <span class="tooltip2">?
                                    <span class="tooltiptext">El Egresado podra seleccionar varias opciones</span>
                                    </span>

                                </label></br>

                                <h5>Respuestas</h5>
                              <!--BOTON QUE SE ENCARGA DE AÑADIR RESPUESTA
                                mediante el onclick-->
                                <input type="text" id="resp_0" name="opcion0" class="form-control"><br>
                                <input type="text" id="resp_1" name="opcion1" class="form-control">
                                <!--En este DIV se incertan los nuevos campos para las respuestas-->
                                <div id="respuestas"></div>
                                </div>
                                <br>
                                <button type="button" class="btn btn-success mb-1" id="añadirRespuesta" onclick="agregarRespuesta()">
                                    Añadir respuesta
                                </button>

                            <!--Este boton siempre se ve-->
                            
                        </div>
                    </div>
                    
                    <div style="text-align:left;">
                    <br>
                    <input type="submit" value="Guardar" class="btn btn-success">
                    <a href="/menuvice/mantenimiento" class="btn btn-danger ">Cancelar</a>
                    </div>
            </form>
            <br>
<div>
@endsection

@section('scripts')
<script>
var indice = 3;

// DIV donde se estaran insertando los nuevos elementos.
var respuestas = document.getElementById("respuestas");

function agregarRespuesta(){
        //Creo un DIV
        var elemento = document.createElement('div');

        //Le asigno un ID a el DIV creado
        elemento.id = "resp_"+indice;

        //Le inserto un input y un boton para eliminar, al DIV.
        elemento.innerHTML = '<br><input required name="opcion'+indice+'" placeholder="Respuesta'+indice+'"'
        +'class="respuesta form-control" type="text" id="resp_'+indice+'"><div style="height:5px"></div><button class="btn btn-danger" '
        +'id="eliminar_"'+indice+' onclick="eliminarRespuesta('+indice+')">Eliminar</button>'
        /*El boton de eliminar llama la funcion eliminarRespuesta
        le mando como parametro el indice de
        */
        //inserto el DIV con todo lo que se le agrego al DIV que esta en el HTML
        document.getElementById("respuestas").appendChild(elemento);
        indice++;
}


//Recibo el ID correspondiente.
function eliminarRespuesta(id){
    //Rescato el ID del DIV al  que voy a eliminar.
    var elemento = document.getElementById("resp_"+id);
    //Procedo a ELIMINARLO
    elemento.remove();
    indice--;
}

function preguntaTipo(){

    var lista = document.getElementById("tipoPregunta");
    var texto = lista.options[lista.selectedIndex].text;

    var agregarPregunta = document.getElementById("agregarPregunta");
    var preguntaCerrada = document.getElementById("preguntaCerrada");

    if(texto=="Pregunta Abierta"){

        agregarPregunta.style.display="block";
        preguntaCerrada.style.display="none";
        document.getElementById("CR").required = false;
        document.getElementById("CC").required = false;
        document.getElementById("resp_0").required = false;
        document.getElementById("resp_1").required = false;

        document.getElementById("CR").checked = false;
        document.getElementById("CC").checked = false;

    }else if(texto=="Pregunta Cerrada"){
        agregarPregunta.style.display="block";
        preguntaCerrada.style.display="block";
        document.getElementById("CR").required = true;
        document.getElementById("CC").required = true;
        document.getElementById("resp_0").required = true;
        document.getElementById("resp_1").required = true;

    }

}
</script>
@endsection
