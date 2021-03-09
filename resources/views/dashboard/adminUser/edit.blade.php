@extends('layouts.app')

@section('content')
    <div class="mt-5 d-flex ml-auto">
        <div class="col-11 col-sm-10 col-lg-9 col-xl-8 mx-auto px-0 border">
            <div class="bg-light py-2 pl-4  border-bottom">
                <h2 class="font-roboto title d-inline">Editar Usuario</h2>
            </div>
            
            <div class="mb-3 mx-3">
                <form action="{{route('user.update', $user)}}" method="post" enctype="multipart/form-data">
                    @csrf
        
                    @method('put')
        
                    <div class="mt-3">
                        <label for="route_photo">Foto de Perfil:</label>
                        <div>
                            <img src="{{asset('/images/photo/'.$user->photo->route_photo)}}" width="100">
                            <input type="file" name="route_photo">
                        </div>
                    </div>
        
                    <div class="mt-3">
                        <label for="name">Nombre:</label>
                        <div>
                            <input class="form-control" type="text" name="name" value="{{old('name', $user->name)}}">
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
                            <input class="form-control" type="text" name="email" value="{{old('email', $user->email)}}">
                        </div>
                    </div>
                    @error('email')
                        <span>
                            *Error: {{$message}}
                        </span>
                    @enderror
        
                    <div class="mt-3">
                        <label>Roles de Usuario</label>
                        <div class="row pl-5 pt-2">
                            @foreach ($roles as $role)
                                <div class="col-6 col-md-4">
                                    <input  type="checkbox" id="{{$role->name}}" name="role[]" value="{{$role->id}}" @foreach ($user->roles as $key){{($key['name'] == $role->name) ? 'checked' : ''}} @endforeach><label for="{{$role->name}}">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                    @error('role')
                        <div>
                            <small>*Error: {{$message}}</small>
                        </div>
                    @enderror
        
                    <div class="mt-3 ml-3 float-right">
                        <input class="btn btn-primary d-flex ml-auto" type="submit" value="Actualizar">
                        
                    </div>
                </form>
                <div class="mt-3">
                    <form action="{{route('user.destroy', $user)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger d-flex ml-auto" type="submit" value="Eliminar">
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    
@endsection



