@extends('layouts.app')

@section('content')
    <h2>Edit {{$user->name}}</h2>

    <div>
        <form action="{{route('user.edit', $user)}}" method="post" enctype="multipart/form-data">
            @csrf

            @method('update')

            <div>
                <label for="route_photo">Foto de Perfil:</label>
                <div>
                    @if ($user->photo_id != null)
                        <img src="{{asset('/images/photo/'.$user->photo->route_photo)}}">
                    @else
                        <img src="{{asset('images/photo/usuarioAnonimo.jpg')}}" width="100">    
                    @endif
                    <input type="file" name="route_photo">
                </div>
            </div>

            <div>
                <label for="name">Nombre:</label>
                <div>
                    <input type="text" name="name" value="{{old('name', $user->name)}}">
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
                    <input type="text" name="email" value="{{old('email', $user->email)}}">
                </div>
            </div>
            @error('email')
                <span>
                    *Error: {{$messge}}
                </span>
            @enderror

            <div>
                <input type="submit" value="Actualizar">
            </div>
        </form>
        <div>
            <form action="{{route('user.destroy', $user)}}" method="post">
                <input type="submit" value="Eliminar">
            </form>
        </div>
    </div>
@endsection

