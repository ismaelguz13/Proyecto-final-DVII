<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('content')</title>
    <link rel="stylesheet" url="css/bootstrap.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/menuest.css') }}" rel="stylesheet">
</head>

<body class="htmlbg">
    <img src="{{asset ('imagenes/fisc.png')}}" class="imglge1">
    <img src="{{asset ('imagenes/utplogo.png')}}" class="imglge">
    <form action="/{{$url}}" method="GET" class="text-center form-position">
        <div class="form-group">
            <button type="submit" id="startBtn" class="btn btn-success btn-color text-white">
                {{$texto}}
            </button>
        </div>
        <div class="form-group">
            <a class="btn btn-success btn-color text-white" href="/">
                Retornar
            </a>
        </div>
    </form>
</body>
<style>
    .form-position {
        position: relative;
        top: 350px;
    }

    .btn-color {
        text-decoration: none;
        border-color: #005B28 !important;
        background-color: #005B28 !important;
        font-size: 32px;
    }

    .btn-color:hover {
        background-color: rgba(0, 91, 40, 0.8) !important;
    }
</style>

</html>