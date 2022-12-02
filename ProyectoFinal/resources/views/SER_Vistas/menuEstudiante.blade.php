@extends('P_PantallaBase')

@section('secciones')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h2 class="h2">Seleccione una opción:</h2">
            <hr style=" border-color: green; width:550px; margin-left:0%">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 d-flex flex-column align-items-center">
            <a href="/menu/est/mantenimiento" class="btn btn-success btn-estudiante"> Mantenimiento de encuesta </a>
            <a href="/menu/est/modificarPlan" class="btn btn-success btn-estudiante"> Modificar Plan de Estudio </a>
            <a href="/menu/est/salonesEncuestados" class="btn btn-success btn-estudiante"> Salones Encuestados </a>
            <a href="/menu/est/salonesNoEncuestados" class="btn btn-success btn-estudiante"> Salones No Encuestados </a>
            <a href="/menu_admi" class="btn btn-success btn-estudiante"> Volver </a>
        </div>
    </div>
</div>
<style>
    .btn-estudiante {
        background-color: #005B28;
        border-color: #005B28;
        margin-bottom: 10px;
        width: 65%;
        padding: 10px;
        font-size:24px;
    }
</style>
@endsection