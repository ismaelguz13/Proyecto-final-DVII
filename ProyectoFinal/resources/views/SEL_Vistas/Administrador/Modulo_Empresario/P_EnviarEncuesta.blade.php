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
      <a class="dropdown-item" href="#">Enviar Encuestas</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Ver Resultados</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Comparar Resultados</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Exportar Resultados</a>
    </div>
  </div>
</li>
@endsection


@section('secciones')

<form action="/menu/emp/enviando" method="POST">
    @csrf
    <h1>Enviar Encuesta</h1>
    <div class="form-group">
        <label for="id_usuario">Correos Registrados</label>
        <select name="id_usuario" id="id_usuario" class="form-control">
            @foreach($empresarios as $empresario)
            <option value="{{$empresario->id_usuario}}">{{$empresario->correo}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group d-flex justify-content-between">
        <a href="/menu/emp" class="btn btn-success btn-color">Cancelar</a>
        <button class="btn btn-success btn-color">Enviar</button>
    </div>
</form>
<style>
    .btn-color {
        border-color: #005B28 !important;
        background-color: #005B28 !important;
    }

    .btn-color:hover {
        background-color: rgba(0, 91, 40, 0.8) !important;
    }
</style>
@endsection