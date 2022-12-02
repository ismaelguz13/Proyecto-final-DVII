@extends('P_PantallaBase')

@section ('nav')
<li class="nav-item ml-4">
  <div class="dropdown">
    <a class="nav-link dropdown-toggle text-dark p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <b>Módulo Empresario</b>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="/menu/emp">Menu Empresario</a>
      <a class="dropdown-item" href="/menu/emp/mantenimiento">Mantenimiento</a>
      <a class="dropdown-item" href="/menu/emp/estadisticas">Estadísticas de Encuesta</a>
      <a class="dropdown-item" href="/menu/emp/enviar">Enviar Encuestas</a>
    </div>
  </div>
</li>
@endsection


@section('secciones')
<div class="row">
    <div class="col-12 pt-4">
        <h1 class="h1">Agregar Pregunta</h1>
    </div>
</div>
<form action="/menu/emp/mantenimiento/agregando" method="POST">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <span>Todos los campos son requeridos</span>
        @endforeach
    </div>
    @endif
    <div class="form-group">
        <label for="id_encuesta" class="form">Encuesta:</label>
        <select class="form-control" name="id_encuesta" id="id_encuesta" disabled="disabled">
            <option value="4" selected>Encuesta Empresario</option>
        </select>
        <input type="hidden" name="id_encuesta" value="4" />
    </div>

    <div class="form-group">
        <label for="id_seccion" class="form">Seccion:</label>
        <select class="form-control" name="id_seccion" id="id_seccion">
            <option value="9" selected>Sección A: Datos Generales de la empresa</option>
            <option value="10">Sección B: Perfil Profesional</option>
            <option value="11">Sección C: Datos generales de la persona que llena la encuesta</option>
        </select>

    </div>

    <div class="form-group">
        <label for="tipo_preg" class="form">Tipo de Pregunta</label>
        <select class="form-control" name="tipo_preg" id="tipo_preg" onchange="tipoPreg()">
            <option value="A" selected>Libre</option>
            <option value="CR">Seleccion Multiple</option>
            <option value="CC">Respuestas Múltiples</option>
        </select>
    </div>


    <div class="form-group">
        <label for="descrip_preg" class="form">Escriba su pregunta</label>
        <input type="text" class="form-control {{ $errors->has('descrip_preg') ? ' is-invalid' : '' }}" id="descrip_preg" name="descrip_preg">
    </div>

    <div class="form-group" id="form_respuesta" style="display:none">
        <label for="descrip_opcion" class="form">Escriba las opciones</label>
        <div id="respuestas">
            <div class="row form-group">
                <div class="col-12">
                    <input name=descrip_opcion_0 id=descrip_opcion_0 class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <input name=descrip_opcion_1 id=descrip_opcion_1 class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <button type="button" id="agregarResp" class="btn btn-success btn-color" onclick="addResp()">Agregar respuesta</button>
        </div>
    </div>

    <div class="form-group d-flex justify-content-between mt-5 mb-5">
        <a href="/menu/emp/mantenimiento" class="btn btn-success btn-color">Cancelar</a>
        <button type="submit" class="btn btn-success btn-color">Guardar</button>
    </div>
</form>

@endsection
<style>
    .btn-color {
        border-color:  #005B28 !important;
        background-color:  #005B28 !important;
    }

    .btn-color:hover {
        background-color: rgba(0, 91, 40, 0.8) !important;
    }
</style>
@section('scripts')
<script src="{{asset('js/agregar_pregunta.js')}}"></script>
@endsection