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