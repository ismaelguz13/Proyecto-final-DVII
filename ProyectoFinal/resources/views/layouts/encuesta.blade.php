<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script url="js/app.js" defer></script>
    @yield('scripts')
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel ="stylesheet" url="css/bootstrap.min.css">
    <!-- Styles -->
    @yield('styles')
    <style>
    .anav{
    color: black;
    font-family: "Pill Gothic 600mg Semibd", sans-serif;
    }
    
    </style>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">     
</head>
<!-- UTP HEADER -->
<header style="background-image: url(../imagenes/headerutp.jpg); background-repeat: no-repeat; background-size: cover; padding: 8.3%; ">
</header>
<!--NAV NAME -->
<nav class="navbar navbar-light" style="background-color:#005B28;">
  <!-- Navbar content -->
  <a class="navbar-brand" style="color: #fff" href="#"> EGRESADO </a>
</nav>
   <!-- NAV PRINCIPAL -->

<nav class="navbar navbar-expand-sm justify-content-center navbar-light sticky-top" style="font-family: Pill Gothic 600mg Semibd sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
@yield('section')
</nav>

<body style="background-image: url(../imagenes/WebBackground.jpg); background-repeat: no-repeat; background-size: cover;">
    @yield('content')
</body>
</html>