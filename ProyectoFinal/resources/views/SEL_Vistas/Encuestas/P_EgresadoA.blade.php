@extends('layouts.encuesta')
@section('styles')
<style>
 a.active.nav-link{background-color: green!important;
 color:white!important;
 }
</style>
@endsection
@section('section')
    <ul class="nav nav-tabs">
    <li class="nav-item" role="presentation"><a class="nav-link active " style="color: black;" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sección A:Generales Demograficos</a>
    </li>
    <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" style="color: black;" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sección B:Generales de Contacto</a>
  </li>
</ul>
 @endsection
@section('content')
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <!--Sección A-->
  @if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <span>Todos los campos son requeridos</span>
    @endforeach
</div>
@endif
<br>
<div class="container">
    {{-- <button type="button" class="btn btn-dark btn-color" id="enviar_data">Terminar Encuesta</button> --}}
    <form action="login" method="POST" id="formulario">
        @csrf
        @foreach($preguntas as $pregunta)
        @if ($pregunta->id_seccion == 7)
        <div class="card mb-3">
            <div class="form-group">
                <div class="card-header p-3 mb-4 pregunta-header">
                    <label for="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" class="title-label">{{$pregunta->descrip_preg}}</label>
                </div>
                @if($pregunta->tipo_preg == 'A')
                @foreach($opciones as $opcion)
                @if($pregunta->id_pregunta == $opcion->id_pregunta)
                <div class="p-3">
                    <input type="text" size="60" class="form-control" class="text-label" placeholder="{{$opcion->descrip_opcion}}" name="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}">
                </div>
                @endif
                @endforeach
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
                    <select name="{{$opcion->id_pregunta}}" id="opciones{{$opcion->id_opcion}}">
                    <option value="{{$opcion->id_opcion}}">{{$opcion->descrip_opcion}}</option>
                    <option value="{{$opcion->id_opcion}}">1977</option>
                    <option value="{{$opcion->id_opcion}}">1978</option>
                    <option value="{{$opcion->id_opcion}}">1979</option>
                    <option value="{{$opcion->id_opcion}}">1980</option>
                    <option value="{{$opcion->id_opcion}}">1981</option>
                    <option value="{{$opcion->id_opcion}}">1982</option>
                    <option value="{{$opcion->id_opcion}}">1983</option>
                    <option value="{{$opcion->id_opcion}}">1984</option>
                    <option value="{{$opcion->id_opcion}}">1985</option>
                    <option value="{{$opcion->id_opcion}}">1986</option>
                    <option value="{{$opcion->id_opcion}}">1987</option>
                    <option value="{{$opcion->id_opcion}}">1988</option>
                    <option value="{{$opcion->id_opcion}}">1989</option>
                    <option value="{{$opcion->id_opcion}}">1990</option>
                    <option value="{{$opcion->id_opcion}}">1991</option>
                    <option value="{{$opcion->id_opcion}}">1992</option>
                    <option value="{{$opcion->id_opcion}}">1993</option>
                    <option value="{{$opcion->id_opcion}}">1994</option>
                    <option value="{{$opcion->id_opcion}}">1993</option>
                    <option value="{{$opcion->id_opcion}}">1994</option>
                    <option value="{{$opcion->id_opcion}}">1995</option>
                    <option value="{{$opcion->id_opcion}}">1996</option>
                    <option value="{{$opcion->id_opcion}}">1997</option>
                    <option value="{{$opcion->id_opcion}}">1998</option>
                    <option value="{{$opcion->id_opcion}}">1999</option>
                    <option value="{{$opcion->id_opcion}}">2000</option>
                    <option value="{{$opcion->id_opcion}}">2001</option>
                    <option value="{{$opcion->id_opcion}}">2002</option>
                    <option value="{{$opcion->id_opcion}}">2003</option>
                    <option value="{{$opcion->id_opcion}}">2004</option>
                    <option value="{{$opcion->id_opcion}}">2005</option>
                    <option value="{{$opcion->id_opcion}}">2006</option>
                    <option value="{{$opcion->id_opcion}}">2007</option>
                    <option value="{{$opcion->id_opcion}}">2008</option>
                    <option value="{{$opcion->id_opcion}}">2010</option>
                    <option value="{{$opcion->id_opcion}}">2011</option>
                    <option value="{{$opcion->id_opcion}}">2012</option>
                    <option value="{{$opcion->id_opcion}}">2013</option>
                    <option value="{{$opcion->id_opcion}}">2014</option>
                    <option value="{{$opcion->id_opcion}}">2015</option>
                    <option value="{{$opcion->id_opcion}}">2016</option>
                    <option value="{{$opcion->id_opcion}}">2017</option>
                    <option value="{{$opcion->id_opcion}}">2018</option>
                    <option value="{{$opcion->id_opcion}}">2019</option>
                    <option value="{{$opcion->id_opcion}}">2020</option>
                    </select>
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
            </div>
        </div>

    </form>
</div>

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <!--Sección B-->
  @if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <span>Todos los campos son requeridos</span>
    @endforeach
</div>
@endif
<div class="container">
    <form action="/enviar-encuesta" method="POST">
        @csrf
        @foreach($preguntas as $pregunta)
        @if ($pregunta->id_seccion == 8)
        <div class="card mb-3">
            <div class="form-group">
                <div class="card-header p-3 mb-4 pregunta-header">
                    <label for="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}" class="title-label">{{$pregunta->descrip_preg}}</label>
                </div>
                @if($pregunta->tipo_preg == 'A')
                @foreach($opciones as $opcion)
                @if($pregunta->id_pregunta == $opcion->id_pregunta)
                <div class="p-3">
                    <input type="text" size="60" class="form-control" class="text-label" placeholder="{{$opcion->descrip_opcion}}" name="{{$pregunta->id_pregunta}}" id="{{$pregunta->id_pregunta}}">
                </div>
                @endif
                @endforeach
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
                <div class="form-check">
                    <select name="{{$opcion->id_pregunta}}" id="opciones{{$opcion->id_opcion}}" value="{{$opcion->id_opcion}}">
                    <option value>--Selecionar Año--</option>
                @foreach($opciones as $opcion)
                @if($pregunta->id_pregunta == $opcion->id_pregunta)
                    
                    <option value>{{$opcion->descrip_opcion}}</option>
                  
                @endif
                @endforeach
                </select>
                    </div>
                @endif
            </div>
        </div>
        @endif
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <a href="{{url('/')}}" class="btn btn-dark btn-color">Cancelar</a>
                {{-- <button type="submit" class="btn btn-dark btn-color">Terminar Encuesta</button> --}}
                {{-- <button type="button" class="btn btn-dark btn-color" onclick="getdataform()">Terminar Encuesta</button> --}}
                <button type="button" class="btn btn-dark btn-color" id="enviar_data">Terminar Encuesta</button>
            </div>
        </div>
  </div>
</div>

@endsection
@section ('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script> $('#myTab a').on('click', function (e) {e.preventDefault()$(this).tab('show')})</script>

    <script>
        // function getdataform() {
        //     console.log(this);
        //     var data = {};
        //     $('input').each(function(){
        //         data[this.name] = this.value;
        //     });
        //     console.log(data);
        // }

        $(document).ready(function () {
            $('#enviar_data').on('click',function(){
            var data = $('form').serializeArray().reduce(function(obj, item) {
                console.log(item.value);
                if(item.value != "" && item.name !='_token'){
                    obj[item.name] = item.value;
                }
                return obj;
            }, {});
            enviar_respuesta(data);
            });


        function enviar_respuesta(data) {
           
            var formData = new FormData();
            formData.append('data',JSON.stringify(data));
            formData.append('_token',$("input[name='_token']").val())
                $.ajax({
                    url: '/api-save',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                      alert(response.message)
                    }
                });
        }
        });
    </script>

    @endsection
    <style>
    .btn-color {
        border-color:  #005B28 !important;
        background-color:  #005B28 !important;
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
   
    [type="radio"]{
        position:relative;
        left: 15px;
        padding-left: 28px;
        display: inline-block;
    }
</style>