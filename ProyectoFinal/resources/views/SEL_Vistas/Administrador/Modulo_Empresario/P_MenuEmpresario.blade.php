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
      <a class="dropdown-item" href="/menu/emp/mantenimiento">Mantenimiento</a>
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

<div class="container">
  <div class="row mt-4">
    <div class="col-12">
      <h2 class="h2">Seleccione una opción:</h2">
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-12 d-flex flex-column align-items-center">
      <a href="/menu/emp/mantenimiento" class="btn btn-success btn-empresario"> Mantenimiento de encuesta </a>
      <a href="/menu/emp/estadisticas" class="btn btn-success btn-empresario"> Estadística de encuesta </a>
      <a href="/menu/emp/enviar" class="btn btn-success btn-empresario"> Enviar encuesta </a>
      <a href="/menu/emp/unavailable" class="btn btn-success btn-empresario"> Ver Resultados </a>
      <a href="/menu/emp/unavailable" class="btn btn-success btn-empresario"> Comparar Resultados </a>
      <a href="/menu/emp/unavailable" class="btn btn-success btn-empresario"> Exportar Resultados </a>
    </div>
  </div>
</div>
<style>
  .btn-empresario {
    background-color: #005B28;
    border-color: #005B28;
    margin-bottom: 10px;
    width: 65%;
    padding: 10px;
    font-size: 24px;
  }
</style>
@endsection
@section('scripts')
<script src="{{asset('js/borrar_emp.js')}}"></script>
@endsection