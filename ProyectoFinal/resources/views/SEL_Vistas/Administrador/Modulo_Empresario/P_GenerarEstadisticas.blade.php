@extends('P_PantallaBase')

@section ('nav')
<li class="nav-item ml-4">
    <div class="dropdown">
        <a class="nav-link dropdown-toggle text-dark p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Módulo Empresario</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/menu/emp/mantenimiento">Mantenimiento</a>
            <a class="dropdown-item" href="#">Estadísticas de Encuesta</a>
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
    <div class="col-12">
        <h1 class="h1">Estadísticas de Encuesta</h1>
    </div>
</div>
<div class="form-group d-flex justify-content-between mt-1">
    <a href="/menu/emp" class="btn btn-success btn-color">Retornar</a>
    <a href="/menu/emp/enviar" class="btn btn-success btn-color">Enviar Encuesta</a>
</div>
<div class="row">
    <div class="col-6">
        <table>
            <tr>
                <th colspan="2" class="text-center table-heading">Empresarios Respondidos</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            @foreach($respondidos as $respondido)
            <tr class="row-data">
                <td>{{$respondido->nombre}} {{$respondido->apellido}}</td>
                <td>{{$respondido->correo}}</td>
            <tr>
                @endforeach
        </table>
    </div>
    <div class="col-6">
        <table>
            <tr>
                <th colspan="2" class="text-center table-heading">Empresarios No Respondidos</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            @foreach($noRespondidos as $noRespondido)
            <tr class="row-data">
                <td>{{$noRespondido->nombre}} {{$noRespondido->apellido}}</td>
                <td>{{$noRespondido->correo}}</td>
            <tr>
                @endforeach
        </table>
    </div>
</div>
@endsection

<style>
    .text-label {
        font-size: 24px;
    }

    .table-heading {
        background-color: #542b6d;
        color: white;
        font-size: 32px;
    }

    .btn-color {
        border-color: #005B28 !important;
        background-color: #005B28 !important;
    }

    .btn-color:hover {
        background-color: rgba(0, 91, 40, 0.8) !important;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        background-color: #005B28;
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        color: white;
    }

    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 12px;
    }

    .row-data:hover {
        background-color: rgba(0, 91, 40, 0.1);
    }
</style>