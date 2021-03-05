@extends('layouts.app')

@section('content')
    <div class="mt-5 d-flex ml-auto">
        <div class="col-11 col-sm-10 col-lg-9 col-xl-8 mx-auto px-0 border">
            <div class="bg-light py-2 pl-4  border-bottom">
                <h2 class="font-roboto title d-inline">Crear Usuario</h2>
            </div>

            <div class="container mb-3">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
        
                    <div class="mt-3">
                        <label for="route_photo">Foto de Perfil:</label>
                        <div>
                            <input type="file" name="route_photo">
                        </div>
                    </div>
        
                    <div class="mt-3">
                        <label for="name">Nombre:</label>
                        <div>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}">
                        </div>
                    </div>
                    @error('name')
                        <span>
                            *Error: {{$message}}
                        </span>
                    @enderror
        
                    <div class="mt-3">
                        <label for="email">Email:</label>
                        <div>
                            <input class="form-control" type="text" name="email" value="{{old('email')}}">
                        </div>
                    </div>
                    @error('email')
                        <span>
                            *Error: {{$message}}
                        </span>
                    @enderror
        
                    <div class="mt-3">
                        <label for="password">Contraseña</label>
                        <div>
                            <input class="form-control" type="password" name="password" value="{{old('password')}}">
                        </div>
                    </div>
                    @error('password')
                        <span>
                            *Error: {{$message}}
                        </span>
                    @enderror
        
                    <div class="mt-3">
                        <label for="password_confirmation">Confirma Contraseña</label>
                        <div>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>
                    </div>
                    @error('password_confirmation')
                        <span>
                            *Error: {{$message}}
                        </span>
                    @enderror
        
                    <div class="mt-3 text-right">
                        <input class="btn btn-primary" type="reset" value="Limpiar">
                        <input class="btn btn-primary" type="submit" value="Crear">
                    </div>
                </form>
            </div>
        </div>
    </div>


    

@endsection

