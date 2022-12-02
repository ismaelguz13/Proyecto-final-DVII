@extends('layouts.admin')

@section('content')

@if (session('status'))
<br>
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif


    <h1 id="title">Nueva Asignatura</h1>

    <br>

    <form action="/menu/est/modificarPlan/agregar" method="post" id="asignueva">
    @csrf
    <div class="row">
    <div class="col-3">
    <label for="fname">Código de Asignatura</label>
    </div>
    <div class="col-9">
    <input type="text" name="cod_asig" placeholder="" size="80" required>
    </div>
    </div>
    <br>
    <!-------------------------------------->
    <div class="row">
    <div class="col-3">
    <label for="lname">Nombre de Asignatura</label>
    </div>
    <div class="col-9">
    <input type="text" name="nombre_asig" placeholder="" size="80" required>
    </div>
    </div>
    <br>
    <!-------------------------------------->
    </form>

    <div class="row fixed-row-bottom">
    <div class="col-12 d-flex justify-content-between">
        <a href="/menu/est/modificarPlan" class="btn btn-success">Regresar</a>
        <button type="submit" form="asignueva" class="btn btn-success">Agregar</a>
    </div>
    </div>
    
@endsection