@extends('layouts.admin')


@section('content')

<div class="container">
    <div class ="row justify-content-center">
        <div class="cold-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <table class='table'>
                        <thead>
                            <th>Numero de Pregunta</th>
                            <th>Pregunta</th>

                        </thead>

                        <tbody>
                            @foreach($preguntas as $pregunta)
                                <tr>
                                    <td>{{$pregunta->id_pregunta}}</td>
                                    <td>{{$pregunta->descrip_preg}}</td>
                                
                                </tr>
                                
                                <tr>
                                    <td>Respuesta:</td>
                                    <td><textarea  rows="1" cols="100"></textarea></td>
                                    
                                
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div> 
            </div> 
        </div>
    </div>      
</div>

@endsection

