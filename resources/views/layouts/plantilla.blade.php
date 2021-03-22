<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/icono.ico') }}">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style-self.css')}}">
    <title>Alluston</title>
</head>
<body>
    <header class="navbar navbar-expand navbar-light bg-prueba border-bottom">
        <x-header/>
    </header>
    
    <nav class="navbar navbar-expand-md navbar-dark bg-prueba sticky-top">
        <x-nav-bar/>
    </nav>

    <section>
        @yield('content')
    </section>

    <footer class="bg-prueba">
        <x-footer/>     
    </footer>

    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/scriptSelf.js')}}"></script>

</body>
</html>