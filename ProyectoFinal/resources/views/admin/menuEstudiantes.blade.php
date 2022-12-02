@extends('layouts.admin')

@section('content')
        <div class="contenido">

            <div class="links">
                <div class="menu">
                <img src="../icons/columns.svg" alt="file SVG">
                    <a href="{{ route('menuR') }}" class="menu-link">Reportes de la Encuesta</a><br><br><br><br>
                </div>

                <div class="menu">
                <img src="../icons/tool.svg" alt="file SVG">
                    <a href="{{ route('menuM') }}" class="menu-link">Mantenimiento de la Encuesta</a><br><br><br><br>
                </div>
                </div>
@endsection