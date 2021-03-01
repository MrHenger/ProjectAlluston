<h1>probando</h1>

<div>
    <a href="{{route('user.create')}}">Crear Usuario</a>
</div>

<div>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th>F. Creacion</th>
            <th>F. Actualizacion</th>
        </tr>
        @if ($users)
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    @if ($user->photo != null)
                        <td><img src="{{asset('/images/photo/'.$user->photo->ruta_photo)}}" width="100"></td>
                    @else
                        <td><img src="{{asset('/images/photo/usuarioAnonimo.jpg')}}" width="100"></td>
                    @endif
                    
                    <td><a href="{{route('user.edit', $user)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td></td>
                    <td class="align-middle">{{$user->created_at}}</td>
                    <td class="align-middle">{{$user->updated_at}}</td>
                </tr>
            @endforeach
        @endif

        
        
    </table>
</div>