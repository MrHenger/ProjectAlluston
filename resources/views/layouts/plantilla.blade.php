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
        <div class="container">
            <a class="mr-auto" href="{{ url('/') }}"><img src="{{ asset('images/logo_alluston.png') }}" height="70" alt="Logo de Alluston"></a>
            @if (Route::has('login'))
                <div>
                    @auth
                        <div class="dropdown">
                            <button class="btn text-white dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
                                @if ($user = Auth::user())
                                    <img class="border-radius_logo" src="{{asset('/images/photo/'.$user->photo->route_photo)}}"></td>
                                @endif
                            </button>
                            <div class=" dropdown-menu " aria-labelledby="navbarDropdown">
                                <a href="{{route('profile.show', Auth::user())}}" class="dropdown-item">Perfil</a>
                                @can('dashboard')
                                    <a href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                </form>                                
                            </div>
                        </div>
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
    <nav class="navbar navbar-expand-md navbar-dark bg-prueba sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('welcome')}}">Inicio</a>
                    </li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}">Tutoriales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">Sobre Nosotros</a>
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
            <p class="py-3 mb-0 text-white">Copyright © 2021 Alluston. Todos los Derechos reservados</p>

            <div></div>
        </div>
        
    </footer>

    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/scriptSelf.js')}}"></script>

</body>
</html>