<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body{
            background-color: #EEEEEE
        }
        .bg-judul{
            display: inline-block;
            background-color:#00ADB5;
            color: white;
            width: 20%;
            border-radius: 10px
        }
        .btn-primary{
            background-color: #187498;
            border: none;
        }
        .btn-primary:hover{
            background-color: #1d3b6a;
            border: none;
        }
        .btn-success{
            background-color: #36AE7C;
            border: none;
        }
        .btn-success:hover{
            background-color: #277b58;
            border: none;
        }
        .btn-danger{
            background-color: #EB5353;
            border: none;
        }
        .btn-danger:hover{
            background-color: #6e1717;
            border: none;
        }
        .btn-warning{
            background-color: #F9D923;
            border: none;
        }
        .btn-warning:hover{
            background-color: #7b6e24;
            border: none;
            color: white
        }
    </style>

</head>
<body>
    @yield('content')
    @vite('resources/js/app.js')
    @stack('scripts')
    @include('sweetalert::alert')
</body>
</html>
