@section('title', 'Salones Encuestados')
@section('navbar', 'Salones Encuestados')
@section('styles')
    <link href="{{ asset('css/pagination.css') }}" rel="stylesheet">    
@endsection

@extends('encuestaResults')

    @section('optionA')
        @foreach($años as $año)
            <option id="option" value="{{$año[0]->year}}">{{$año[0]->year}}</option>
        @endforeach
    @endsection

    @section('optionC')
        @forelse($carreras as $carrera)
           <option id="option" value="{{$carrera->id_carrera}}">{{$carrera->nombre_carrera}}</option>
        @empty
        @endforelse
    @endsection

    @section('results-content')   
       @forelse($respuestas as $respuesta)
            <tr>
                <td>{{$respuesta->grupo->cod_grupo}}</td>
                <td>{{$respuesta->asignatura->nombre}}</td>
                <td>{{$respuesta->semestre}}</td>
            </tr>
        @empty
            <tr>
                <td>No existen salones encuestados con estos parametros</td>
            </tr>
        @endforelse
    @endsection
