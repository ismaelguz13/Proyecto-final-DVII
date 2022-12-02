@extends('P_PantallaBase')


@section('styles')
<link rel="stylesheet" href="{{asset('css/checkmark.css')}}">
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
      <a href="/menu/est" class="agregar mr-4"><button class="btn btn-color text-white">Retornar</button></a>
      <a href="/menu/est/mantenimiento/agregar" class="agregar"><button class="btn btn-color text-white">Agregar Preguntas</button></a>
    </div>
  </div>
</div>
@foreach($preguntas as $pregunta)
<div class="card p-3 mt-3 mb-3 rounded shadow">
  <div class="row">
    <div class="col-12 d-flex">
      <h3 class="h3 mr-3" id="pregunta{{$pregunta->id_pregunta}}">{{$pregunta->descrip_preg }}</h3>
      <a href="/menu/est/mantenimiento/{{$pregunta->id_pregunta}}/edit" class="mr-3 align-self-baseline" title="Editar Pregunta"><i class="far fa-2x fa-edit text-primary"></i></a>
      <a href="#{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" class="open-modal" title="Borrar Pregunta"><i class="fas fa-2x fa-trash-alt text-danger"></i></a>
    </div>
  </div>
  @if($pregunta->tipo_preg == 'A')
  <div class="form-group mt-3">
    <input type="text" class="form-control">
  </div>
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
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger" id="borrar" >Borrar</button>
        </div>
      </div>
    </div>
  </div>

@endsection

<style>
.btn-color {
    border-color: #005B28 !important;
    background-color: #005B28 !important;
  }

</style>

@section('scripts')
<script src="{{asset('js/borrar_est.js')}}"></script> 
@endsection