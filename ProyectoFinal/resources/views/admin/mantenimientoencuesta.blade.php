@extends('layouts.admin')

@section('content')
        <div class="contenido">

            <div class="links">
                <div class="menu">
                <img src="../icons/refresh-ccw.svg" alt="file SVG">
                    <a href="" class="menu-link">Actualizar Preguntas de la Encuesta</a><br><br><br><br>
                </div>
                <div class="menu">
                <img src="../icons/tool.svg" alt="file SVG">
                    <a href="" class="menu-link">Eliminar Preguntas de la Encuesta</a><br><br><br><br>
                </div>

                <div class="menu">
                <img src="../icons/tool.svg" alt="file SVG">
                    <a href="" class="menu-link">Insertar Preguntas a la Encuesta</a><br><br><br><br>
                </div>

                <div class="menu">
                <img src="../icons/arrow-left.svg" alt="file SVG">
                    <a href="{{ route('menuEst') }}" class="menu-link">Regresar</a><br><br><br><br>
            </div>

@endsection