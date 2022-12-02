@extends('P_PantallaBase')

@section('secciones')
<div class="row">
    <div class="col-12 pt-4">
        <h1 class="h1">Editando Pregunta</h1>
    </div>
</div>
<form action="/menu/est/mantenimiento/{{$pregunta->id_pregunta}}" method="POST">
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
            <option value="2" selected>Encuesta Estudiante</option>
        </select>
        <input type="hidden" name="id_encuesta" value="2" />
    </div>

    <div class="form-group">
        <label for="id_seccion" class="form">Seccion:</label>
        <select class="form-control" name="id_seccion" id="id_seccion">
            @if ($pregunta->id_seccion == 3)
            <option value="3" selected>Sección A: Información General</option>
            <option value="4">Sección B: Sobre la Asignatura</option>
            <option value="5">Sección C: Cantidad de Evaluaciones Relizadas</option>
            <option value="6">Sección D: Servicios Académicos</option>
            @elseif ($pregunta->id_seccion == 4)
            <option value="3">Sección A: Información General</option>
            <option value="4" selected>Sección B: Sobre la Asignatura</option>
            <option value="5">Sección C: Cantidad de Evaluaciones Relizadas</option>
            <option value="6">Sección D: Servicios Académicos</option>
            @elseif ($pregunta->id_seccion == 5)
            <option value="3">Sección A: Información General</option>
            <option value="4" >Sección B: Sobre la Asignatura</option>
            <option value="5" selected>Sección C: Cantidad de Evaluaciones Relizadas</option>
            <option value="6">Sección D: Servicios Académicos</option>
            @else
            <option value="3">Sección A: Información General</option>
            <option value="4">Sección B: Sobre la Asignatura</option>
            <option value="5">Sección C: Cantidad de Evaluaciones Relizadas</option>
            <option value="6" selected>Sección D: Servicios Académicos</option>
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
                    <input name=descrip_opcion_0 id=descrip_opcion_0 class="form-control">
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" id="agregarResp" class="btn btn-success " onclick="addResp()">Agregar respuesta</button>
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
