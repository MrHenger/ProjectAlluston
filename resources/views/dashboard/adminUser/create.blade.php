<h2>Crear usuario</h2>

<div>
    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="route_photo">Foto de Perfil:</label>
            <div>
                <input type="file" name="route_photo">
            </div>
        </div>

        <div>
            <label for="name">Nombre:</label>
            <div>
                <input type="text" name="name" value="{{old('name')}}">
            </div>
        </div>
        @error('name')
            <span>
                *Error: {{$message}}
            </span>
        @enderror

        <div>
            <label for="email">Email:</label>
            <div>
                <input type="text" name="email" value="{{old('email')}}">
            </div>
        </div>
        @error('email')
            <span>
                *Error: {{$message}}
            </span>
        @enderror

        <div>
            <label for="password">Contraseña</label>
            <div>
                <input type="password" name="password" value="{{old('password')}}">
            </div>
        </div>
        @error('password')
            <span>
                *Error: {{$message}}
            </span>
        @enderror

        <div>
            <label for="password_confirmation">Confirma Contraseña</label>
            <div>
                <input type="password" name="password_confirmation">
            </div>
        </div>
        @error('password_confirmation')
            <span>
                *Error: {{$message}}
            </span>
        @enderror

        <div>
            <input type="submit" value="Crear">
        </div>
    </form>
</div>
