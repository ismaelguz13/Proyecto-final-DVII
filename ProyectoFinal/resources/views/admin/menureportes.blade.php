@extends('layouts.admin')

@section('content')
        <div class="contenido">

            <div class="links">
                <div class="menu">
                <img src="../icons/search.svg" alt="file SVG">
                    <a href="" class="menu-link">Filtrar Busqueda</a><br><br><br><br>
                </div>
                <div class="menu">
                <img src="../icons/columns.svg" alt="file SVG">
                    <a href="{{ route('SalonesEncuestados') }}" class="menu-link">Salones Encuestados </a><br><br><br><br>
                </div>

                <div class="menu">
                <img src="../icons/columns.svg" alt="file SVG">
                    <a href="{{ route('SalonesNoEncuestados') }}" class="menu-link">Salones no Encuestados</a><br><br><br><br>
                </div>

                <div class="menu">
                <img src="../icons/arrow-left.svg" alt="file SVG">
                    <a href="{{ route('menuEst') }}" class="menu-link">Regresar</a><br><br><br><br>
                </div>
@endsection