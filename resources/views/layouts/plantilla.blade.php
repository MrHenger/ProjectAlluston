<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/icono.ico') }}">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('css/style-self.css')}}">
    <title>Alluston</title>
</head>
<body>
    <header class="navbar navbar-expand navbar-light bg-prueba border-bottom">
        <div class="container">
            <a class="mr-auto" href="{{ url('/') }}"><img src="{{ asset('images/logo_alluston.png') }}" height="70" alt="Logo de Alluston"></a>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a class="btn btn-outline-light" href="{{ url('/home') }}" >Home</a>
                    @else
                        <a class="btn btn-outline-light" href="{{ route('login') }}" >Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-outline-light" href="{{ route('register') }}" >Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-prueba sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Inicio</a>
                    </li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="">Tutoriales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Sobre Nosotros</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    
                </div>
            </div> 
        </div>
              
    </nav>

    <section>
        @yield('content')
    </section>

    <footer class="bg-prueba">
        <div class="container ">
            <p class="m-0 text-white">Copyright © 2021 Alluston. Todos los Derechos reservados</p>

            <div></div>
        </div>
        
    </footer>

    <script src="{{asset('js/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
</body>
</html>