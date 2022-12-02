@extends('P_PantallaBase')

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
<div class="mb-3">
  <a href="/menu/emp" class="agregar mr-4"><button class="btn btn-color text-white">Retornar</button></a>
</div>
<div>
  <img src="https://www.xiatraining.com/images/sitio.jpg" width="100%">
</div>

@endsection
<style>
  .agregar {
    text-decoration: none;
  }

  .btn-color {
    border-color: #005B28 !important;
    background-color: #005B28 !important;
  }

  .btn-color:hover {
    background-color: rgba(0, 91, 40, 0.8) !important;
  }
</style>