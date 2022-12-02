@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="text-center">@yield('title')</h2>
            <div class="input-group mb-3 p-3">
                    <form class="form-inline">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="selectA">Año</label>
                        </div>
                        <select class="custom-select" name="selectA" id="selectA">
                            <option value="" selected>Seleccionar Año</option>
                            <option value="" >Todos los años</option>
                            @yield('optionA')
                        </select>
                        <div class="input-group-prepend pl-2">
                            <label class="input-group-text" for="selectSe">Semestre</label>
                        </div>
                        <select class="custom-select" name="selectSe" id="selectSe">
                            <option value="" selected>Seleccionar Semestre</option>
                            <option value="" >Todos los semestres</option>
                            <option value="I semestre">I Semestre</option>
                            <option value="II semestre">II Semestre</option>
                        </select>
                        <div class="input-group-prepend pl-2">
                            <label class="input-group-text" for="selectC">Carrera</label>
                        </div>
                        <select class="custom-select" name="selectC" id="selectC">
                            <option value="" selected>Seleccionar Carrera</option>
                            <option value="" >Todas las Carreras</option>
                            @yield('optionC')
                        </select>
                        <button class="btn btn-outline-success mt-2 my-sm-0" type="submit">Filtrar</button>
                    </form>
            </div>
            <table class="table table-bordered" id='dtSalonesE'>
                <thead class="btn-estudiante text-white">
                    <tr>
                        <th scope="col">Salón</th>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Semestre</th>
                    </tr>
                </thead>
                <tbody >
                    @yield('results-content')
                </tbody>
            </table>
            <div class="container-fluid w-50 float-left">
                {{$respuestas->appends(request()->except('page'))->links()}}
            </div>
            <div class="container-fluid">
                <a href="/menu/est"><button type="button" class="btn btn-estudiante float-right rounded-0" >Regresar</button></a>
            </div>
    </div>
@endsection
