<h2>Lista de publicaciones</h2>

<div>
    <table>
        <tr>
            <th>ID</th>
            <th>Miniatura</th>
            <th>Title</th>
            <th>F. Creacion</th>
            <th>F. Actualizacion</th>
            <th></th>
        </tr>
        @if ($posts)
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{asset('/images/miniatures/'.$post->miniature->route_miniature)}}" title="{{$post->title}}" width="60" height="30"></td>
                    <td><a href="{{route('post.show', $post)}}">{{$post->title}}</a></td>
                    <td class="align-middle">{{$post->created_at}}</td>
                    <td class="align-middle">{{$post->updated_at}}</td>
                    <td>
                        <div>
                            <form action="{{route('post.destroy', $post)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Eliminar">Eliminar</button>
                            </form>
                        </div>
                        <a href="{{route('post.edit', $post)}}">Editar</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>