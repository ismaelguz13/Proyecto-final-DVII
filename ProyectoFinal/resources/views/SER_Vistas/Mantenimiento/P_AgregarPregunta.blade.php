@extends('P_PantallaBase')

@section('secciones')
<div class="row">
    <div class="col-12 pt-4">
        <h1 class="h1">Agregar Pregunta</h1>
    </div>
</div>
<form action="/menu/est/mantenimiento/agregando" method="POST">
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
            <option value="2" selected>Encuesta Estudiante</option>
        </select>
        <input type="hidden" name="id_encuesta" value="2" />
    </div>

    <div class="form-group">
        <label for="id_seccion" class="form">Seccion:</label>
        <select class="form-control" name="id_seccion" id="id_seccion">
        <option value="3" selected>Sección A: Información General</option>
            <option value="4">Sección B: Sobre la Asignatura</option>
            <option value="5">Sección C: Cantidad de Evaluaciones Relizadas</option>
            <option value="6">Sección D: Servicios Académicos</option>
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
            <button type="button" id="agregarResp" class="btn btn-success" onclick="addResp()">Agregar respuesta</button>
        </div>
    </div>

    <div class="form-group d-flex justify-content-between mt-5 mb-5">
        <a href="/menu/est/mantenimiento" class="btn btn-success">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

@endsection

@section('scripts')
<script src="{{asset('js/agregar_pregunta.js')}}"></script>
@endsection