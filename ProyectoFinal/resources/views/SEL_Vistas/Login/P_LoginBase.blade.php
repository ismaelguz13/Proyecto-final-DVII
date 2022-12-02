<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('content')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel ="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/login copy.css') }}" rel="stylesheet">

</head>
<body style="background: transparent;">
<img src="{{asset ('Imagenes/fisc.png')}}" class="imglg1">
 <img src="{{asset ('Imagenes/utplogo.png')}}" class="imglg">
<div class="sidenav"> </div>
     
    <!--Se coloca las secciones de las partes de login-->
    @yield('seccion_login')


</body>
</html>

