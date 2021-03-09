@extends('layouts.app')

@section('content')
    <div class="mx-1">
        <h2 class="d-flex col-11 col-sm-10 col-md-8 mx-auto mt-4 font-roboto title">Panel de administrador</h2>
        <div class="d-flex col-12 col-sm-10 col-md-8 mx-auto">
            <a class="btn btn-dark ml-auto my-3" href="{{route('user.create')}}">Crear Usuario</a>
        </div>
    </div>

    <div class="table-responsive col-11 col-sm-10 col-md-8 mx-auto">
        @if (session('save'))
            <div class=" alert alert-success">
                <strong>{{session('save')}}</strong>
            </div>    
        @endif
        <table class="table table-sm ">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                </tr>
            </thead>
            
            @if ($users)
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td class="align-middle">{{$user->id}}</td>
                        <td class="align-middle"><img src="{{asset('/images/photo/'.$user->photo->route_photo)}}" width="100"></td>                        
                        <td class="align-middle"><a href="{{route('user.edit', $user)}}">{{$user->name}}</a></td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">
                            @foreach ($user->roles as $role)
                                <div>
                                    {{$role['name']}}
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        {{$users->links()}}
    </div>
@endsection

