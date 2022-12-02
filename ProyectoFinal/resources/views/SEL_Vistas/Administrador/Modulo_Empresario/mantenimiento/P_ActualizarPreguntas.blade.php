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
      <a class="dropdown-item" href="/menu/emp/unavailable">Ver Resultados</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Comparar Resultados</a>
      <a class="dropdown-item" href="/menu/emp/unavailable">Exportar Resultados</a>
    </div>
  </div>
</li>
@endsection


@section('secciones')
<div class="row">
    <div class="col-12 pt-4">
        <h1 class="h1">Editando Pregunta</h1>
    </div>
</div>
<form action="/menu/emp/mantenimiento/{{$pregunta->id_pregunta}}" method="POST">
    @csrf
    @method('PATCH')
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
            @if ($pregunta->id_seccion == 9)
            <option value="9" selected>Sección A: Datos Generales de la empresa</option>
            <option value="10">Sección B: Perfil Profesional</option>
            <option value="11">Sección C: Datos generales de la persona que llena la encuesta</option>
            @elseif ($pregunta->id_seccion == 10)
            <option value="9" >Sección A: Datos Generales de la empresa</option>
            <option value="10" selected>Sección B: Perfil Profesional</option>
            <option value="11">Sección C: Datos generales de la persona que llena la encuesta</option>
            @else
            <option value="9">Sección A: Datos Generales de la empresa</option>
            <option value="10">Sección B: Perfil Profesional</option>
            <option value="11"selected>Sección C: Datos generales de la persona que llena la encuesta</option>
            @endif
        </select>
    </div>

    @if($pregunta->tipo_preg == 'A')
    <div class="form-group">
        <label for="tipo_preg" class="form">Tipo de Pregunta</label>
        <select class="form-control" name="tipo_preg" id="tipo_preg" onchange="tipoPreg()">
            <option value="A" selected>Libre</option>
            <option value="CR">Seleccion Multiple</option>
            <option value="CC">Respuestas Multiples</option>
        </select>
    </div>
    @elseif ($pregunta->tipo_preg=='CR')
    <div class="form-group">
        <label for="tipo_preg" class="form">Tipo de Pregunta</label>
        <select class="form-control" name="tipo_preg" id="tipo_preg" onchange="tipoPreg()">
            <option value="A" >Libre</option>
            <option value="CR" selected>Seleccion Multiple</option>
            <option value="CC">Respuestas Multiples</option>
        </select>
    </div>
    @elseif($pregunta->tipo_preg=='CC')
    <div class="form-group">
        <label for="tipo_preg" class="form">Tipo de Pregunta</label>
        <select class="form-control" name="tipo_preg" id="tipo_preg" onchange="tipoPreg()">
            <option value="A" >Libre</option>
            <option value="CR">Seleccion Multiple</option>
            <option value="CC" selected>Respuestas Multiples</option>
        </select>
    </div>
    @endif


    <div class="form-group">
        <label for="descrip_preg" class="form">Escriba su pregunta</label>
        <input type="text" class="form-control" id="descrip_preg" name="descrip_preg" value="{{$pregunta->descrip_preg}}">
    </div>

    <div class="form-group" id="form_respuesta">
        <label for="descrip_opcion" class="form">Escriba las opciones</label>
        <div id="respuestas">
            @foreach($opciones as $key => $opcion)
                @if ($key == 2)
                    @break
                @endif
            <div class="row form-group">
                <div class="col-12">
                    <input name=descrip_opcion_{{$key}} id=descrip_opcion_{{$key}} class="form-control" value="{{$opcion->descrip_opcion}}">
                </div>
            </div>
            @endforeach
            @foreach($opciones as $key => $opcion)
                @if($key >= 2)
            <div class="row form-group">
                <div class="col-12 d-flex">
                    <input name=descrip_opcion_{{$key}} id=descrip_opcion_{{$key}} class="form-control mr-3" value="{{$opcion->descrip_opcion}}">
                    <button type="button" class="btn btn-danger" id={{$key}} onclick="borrar(this.id)"><i class="fas fa-lg fa-trash-alt"></i></button>
                </div>
            </div>
                @endif
            @endforeach
            @if($pregunta->tipo_preg == 'A')
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
            @endif
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" id="agregarResp" class="btn btn-success btn-color" onclick="addResp()">Agregar respuesta</button>
    </div>

    <div class="form-group d-flex justify-content-between mt-5 mb-5">
        <a href="/menu/emp/mantenimiento" class="btn btn-success btn-color">Cancelar</a>
        <button type="submit" class="btn btn-success btn-color">Guardar</button>
    </div>
</form>
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

</style>



@section('scripts')
<script src="{{asset('js/agregar_pregunta.js')}}"></script>
@endsection
