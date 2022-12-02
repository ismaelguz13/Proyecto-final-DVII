@extends('P_PantallaBase')


@section('styles')
<link rel="stylesheet" href="{{asset('css/checkmark.css')}}">
@endsection

@section ('nav')
<li class="nav-item ml-4">
  <div class="dropdown">
    <a class="nav-link dropdown-toggle text-dark p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <b>Módulo Empresario</b>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Mantenimiento</a>
      <a class="dropdown-item" href="/menu/emp/estadisticas">Estadísticas de Encuesta</a>
      <a class="dropdown-item" href="/menu/emp/enviar">Enviar Encuestas</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Ver Resultados</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Comparar Resultados</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Exportar Resultados</a>
    </div>
  </div>
</li>
@endsection

@section('secciones')
@if (session('status'))
<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
          <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
          <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
        <h5 class="modal-title mt-3">{{session('status')}}</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-12 d-flex justify-content-between">
    <h1 class="h1">Mantenimiento a Encuesta</h1>
    <div>
      <a href="/menu/emp" class="agregar mr-4"><button class="btn btn-color text-white">Retornar</button></a>
      <a href="/menu/emp/mantenimiento/agregar" class="agregar"><button class="btn btn-color text-white">Agregar Preguntas</button></a>
    </div>
  </div>
</div>
@foreach($preguntas as $pregunta)
<div class="card pr-3 pl-3 mb-3 ">
  <div class="row">
    <div class="col-12 d-flex card-header pregunta-header mb-3">
      <h3 class="h3 mr-3" id="pregunta{{$pregunta->id_pregunta}}" >{{$pregunta->descrip_preg }}</h3>
      <a href="/menu/emp/mantenimiento/{{$pregunta->id_pregunta}}/edit" class="mr-3 align-self-baseline"><i class="far fa-2x fa-edit text-primary"></i></a>
      <a href="#{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" class="open-modal"><i class="fas fa-2x fa-trash-alt text-danger"></i></a>
    </div>
  </div>
  <!-- SI ES ABIERTA -->
  @if($pregunta->tipo_preg == 'A')
  <div class="form-group">
    <input type="text" class="form-control">
  </div>
   <!-- SI ES CERRADA -->
  @elseif($pregunta->tipo_preg == 'CR')
  @foreach($opciones as $opcion)
  @if($pregunta->id_pregunta == $opcion->id_pregunta)
  <div class="form-check">
    <input type="radio" name="opciones{{$pregunta->id_pregunta}}" id="opciones{{$opcion->id_opcion}}">
    <label class="pr-2 h5" for="opciones{{$opcion->id_opcion}}">
      {{ $opcion->descrip_opcion }}
    </label>
  </div>
  @endif
  @endforeach
  @else
   <!-- SI ES CERRADA CON VARIAS RESPUESTAS -->
  @foreach($opciones as $opcion)
  @if($pregunta->id_pregunta == $opcion->id_pregunta)
  <div class="form-check">
    <input type="checkbox" name="opciones{{$pregunta->id_pregunta}}" id="opciones{{$opcion->id_opcion}}">
    <label class="pr-2 h5" for="opciones{{$opcion->id_opcion}}">
      {{ $opcion->descrip_opcion }}
    </label>
  </div>
  @endif
  @endforeach
  @endif
</div>
@endforeach

<div class="modal fade" id="borrarPregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminando</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-color" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" id="borrar">Borrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
<style>
  .modal-title {
    font-size: 24px;
  }

  .modal-body {
    font-size: 20px;
  }

  .btn-color {
    border-color: #005B28 !important;
    background-color: #005B28 !important;
  }

  .btn-color:hover {
    background-color: rgba(0, 91, 40, 0.8) !important;
  }

  .agregar {
    text-decoration: none;
  }

  .pregunta-header {
        background-color: rgba(0, 91, 40, 1) !important;
        color: white;
    }

  .text-label,
    input[type="text"] {
        font-size: 20px;
        color: #666;
    }

    [type="radio"]:checked,
    [type="radio"]:not(:checked),
    [type="checkbox"]:checked,
    [type="checkbox"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }

    [type="radio"]:checked+label,
    [type="radio"]:not(:checked)+label,
    [type="checkbox"]:checked+label,
    [type="checkbox"]:not(:checked)+label {
        position: relative;
        cursor: pointer;
        padding-left: 28px;
        padding-bottom: 10px;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }

    [type="radio"]:checked+label:before,
    [type="radio"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0px;
        top: 0;
        width: 20px;
        height: 20px;
        border: 1px solid #ddd;
        border-radius: 100%;
        background: #fff;
    }

    [type="checkbox"]:checked+label:before,
    [type="checkbox"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0px;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        border-radius: 20%;
        background: #fff;
    }



    [type="checkbox"]:checked+label:after,
    [type="checkbox"]:not(:checked)+label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: rgba(0, 91, 40, 1);
        position: absolute;
        top: 4px;
        left: 4px;
        border-radius: 20%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }


    [type="radio"]:checked+label:after,
    [type="radio"]:not(:checked)+label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: rgba(0, 91, 40, 1);
        position: absolute;
        top: 4px;
        left: 4px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    [type="radio"]:not(:checked)+label:after,
    [type="checkbox"]:not(:checked)+label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    [type="radio"]:checked+label:after,
    [type="checkbox"]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
    }

    .fa-edit:hover, .fa-trash-alt:hover{
      transform: scale(1.1);
    }

</style>


@section('scripts')
<script src="{{asset('js/borrar_emp.js')}}"></script>
@endsection