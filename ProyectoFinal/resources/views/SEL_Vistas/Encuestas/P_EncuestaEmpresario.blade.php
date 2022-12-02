@extends('P_PantallaEncuesta')
<link rel="stylesheet" href="{{asset('css/checkmark.css')}}">
@section('navbar')
<a class="navbar-brand text-white" href="#"> EMPRESARIO </a>
@endsection

@section('seccion')
<li class="nav-item mr-4">
    <a class="navbar-link anav" href="{{url('#'.$seccionA->id_pregunta)}}" class="text-dark">SECCION A: Datos Generales de la empresa </a>
</li>
<li class="nav-item mr-4">
    <a class="navbar-link anav" href="{{url('#'.$seccionB->id_pregunta)}}"> SECCION B: Perfil Profesional </a>
</li>
<li class="nav-item mr-4">
    <a class="navbar-link anav" href="{{url('#'.$seccionC->id_pregunta)}}"> SECCION C: Datos Generales de la Persona </a>
</li>
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <span>Todos los campos son requeridos</span>
    @endforeach
</div>
@endif
<div class="container">
    <form action="/enviar" method="POST">
        @csrf
        @foreach($preguntas as $pregunta)
        @if ($pregunta->id_encuesta == 4)
        <div class="card mb-3">
            <div class="form-group">
                <div class="card-header p-3 mb-4 pregunta-header">
                    <label for="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" class="title-label">{{$pregunta->descrip_preg}}</label>
                </div>
                @if($pregunta->tipo_preg == 'A')
                <div class="p-3">
                    <input type="text" size="60" class="form-control" class="text-label" name="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}">
                </div>
                @elseif ($pregunta->tipo_preg == 'CR')
                @foreach($opciones as $opcion)
                @if($pregunta->id_pregunta == $opcion->id_pregunta)
                <div class="form-check">
                    <input type="radio" name="{{$pregunta->id_pregunta}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}">
                    <label for="opciones{{$opcion->id_opcion}}" class="text-label ml-3">{{$opcion->descrip_opcion}}</label>
                </div>
                @endif
                @endforeach
                @elseif ($pregunta->tipo_preg == 'CC')
                @foreach($opciones as $opcion)
                @if($pregunta->id_pregunta == $opcion->id_pregunta)
                <div class="form-check">
                    <input type="checkbox" name="{{$opcion->id_pregunta}}_{{$opcion->id_opcion}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}">
                    <label for="opciones{{$opcion->id_opcion}}" class="text-label ml-3">{{$opcion->descrip_opcion}}</label>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        @endif
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <a href="{{url('/')}}" class="btn btn-dark btn-color">Cancelar</a>
                <button type="submit" class="btn btn-dark btn-color" onclick="finalizado()">Terminar Encuesta</button>
            </div>
        </div>

    </form>
</div>
<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
                <h5 class="modal-title mt-3">Encuesta Finalizada</h5>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection



<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/fontawesome_5-14-0.js')}}"></script>
<script src="{{asset('js/jquery_min_3-5-1.js')}}"></script>
<script src="{{asset('js/bootstrap_min_4-5-0.js')}}"></script>

<script>
    function finalizado() {
        $('#mensaje').modal('show');
        setTimeout(function() {
            $('#mensaje').modal('hide');
        }, 2000)
    }
</script>

<style>
    .btn-color {
        border-color: #005B28 !important;
        background-color: #005B28 !important;
    }

    .btn-color:hover {
        background-color: rgba(0, 91, 40, 0.8) !important;
    }

    .pregunta-header {
        background-color: rgba(0, 91, 40, 1) !important;
        color: white;
    }

    .title-label {
        font-size: 24px;
    }

    .card {
        background-color: rgba(80, 78, 78, 0.1) !important;
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
</style>