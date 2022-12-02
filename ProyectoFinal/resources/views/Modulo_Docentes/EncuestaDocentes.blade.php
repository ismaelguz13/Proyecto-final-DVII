
@extends('P_PantallaEncuesta')

@section('styles')
<link rel="stylesheet" href="{{asset('Modulo_docentes/css_personal/TablaDiseño.css')}}">
@endsection

@section('navbar')
<span class="text-white">DOCENTE</span>
@endsection

@section('content')


    <div class="container" style="margin-top: 20px;margin-bottom:20px;">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                <hr class="my-3">
            @endif

                <form class="encuesta" method="post" action="EncuestaDocenteFormulario">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <?php $data = array();
                            $data = Session::get('data');
                            $array = json_decode(json_encode($data), true);

                        ?>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @if (!empty($array))


                        <table>

                            <tr>
                                <th>Grupo</th>
                                <th>Cod. de Grupo</th>
                            </tr>
                                @for ($i = 0; $i < count($data); $i++)
                                <tr>
                                <td>{{$array[$i]['nombre']}}&nbsp &nbsp</td>
                                <td>{{$array[$i]['cod_grupo']}}</td>
                                </tr>
                                @endfor
                        </table>
                        @endif
                    </div>
                @endif

                   <center> <h2>Aplicación de la Encuesta</h2>
                        <br>
                        <b>A continuación rellene todos los campos que se le presentan</b></span></center>
                        <br>
                    <div class="form-row">
                        <!-- Asignaturas-->
                        <div class="form-group col-md-6">
                            <label for="inputState">Nombre de la Asignatura:</label>
                            <select id="inputState" class="form-control" name="asignaturas" required>
                              <option disabled selected>Ninguno seleccionado</option>

                              @foreach ($asignaturas as $asignatura)
                              <option value="{{$asignatura->id_asignatura}}" name="">
                                  [{{$asignatura->cod_asignatura}}] {{$asignatura->nombre}}
                                </option>
                              @endforeach

                            </select>
                          </div>
                        <!-- Grupos-->
                        <div class="form-group col-md-6">
                            <label for="inputState">Grupo:</label>
                            <select id="inputState" class="form-control" name="grupos" required>
                              <option disabled selected>Ninguno seleccionado</option>

                              @foreach ($grupos as $grupo)
                              <option value="{{$grupo->id_grupo}}" name="">{{$grupo->cod_grupo}}</option>
                              @endforeach

                        </select>
                        </div>
                        <!-- Sedes-->
                        <div class="form-group col-md-6">
                            <label for="inputState">Sede: </label>
                            <select id="inputState" class="form-control" name="sedes" required>
                                <option disabled selected>Ninguno seleccionado</option>

                                @foreach ($sedes as $sede)
                                <option value="{{$sede->id_sede}}">{{$sede->nombre_sede}}</option>
                                @endforeach

                            </select>
                          </div>
                          <!-- Carreras-->
                          <div class="form-group col-md-6">
                            <label for="inputState">Carrera:</label>
                            <select id="inputState" class="form-control" name="carreras" required>
                                <option disabled selected>Ninguno seleccionado</option>

                                @foreach ($carreras as $carrera)
                                <option value="{{$carrera->id_carrera}}" name="">{{$carrera->nombre_carrera}}</option>
                                @endforeach

                            </select>
                          </div>
                          <!-- Semestres-->
                          <div class="form-group col-md-6">
                            <label for="inputState">Semestre:</label>
                            <select id="inputState" class="form-control" name="semestres" required>
                                <option disabled selected>Ninguno seleccionado</option>
                                <option value="I Semestre" name="">I Semestre</option>
                                <option value="II Semestre" name="">II Semestre</option>
                            </select>
                          </div>

                          <div class="form-group col-md-12">
                            <label >Cedula: </label>
                            <input type="text" class="form-control" name="cedula" required>
                          </div>

                    <input type="submit" value="Continuar con la encuesta" class="btn btn-success m-3">
                </form>
    </div>
    @endsection
