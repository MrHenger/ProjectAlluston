@extends('layouts.app')

@section('content')
    <div class="mt-5 ml-auto">
        <div class="mx-1">
            <h2 class="d-flex col-11 col-sm-10 col-md-8 mx-auto mt-4 font-roboto title px-0">Listado de Publicaciones</h2>
        </div>

        <div class="table-responsive mt-5 col-11 col-sm-10 col-md-8 mx-auto">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Miniatura</th>
                        <th scope="col">Title</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @if ($posts)
                    @foreach ($posts as $post)
                        <tr class="text-center">
                            <td class="align-middle">{{$post->id}}</td>
                            <td class="align-middle"><img src="{{asset('/images/miniatures/'.$post->miniature->route_miniature)}}" title="{{$post->title}}" width="60" height="30"></td>
                            <td class="align-middle text-left"><a href="{{route('post.show', $post)}}">{{$post->title}}</a></td>
                            <td class="align-middle">
                                <div class="row">
                                    <form action="{{route('post.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="col-6 mx-auto">
                                            <button class="btn btn-danger" type="submit" title="Eliminar"><i class="icon ion-md-close"></i></button>
                                        </div>                                        
                                    </form>
                                    <div class="col-6 mx-auto">
                                        <a class="btn btn-primary" href="{{route('post.edit', $post)}}" title="Editar"><i class="icon ion-md-create"></i></a>
                                    </div>
                                </div>                                
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{$posts->links()}}
        </div>
    </div>


@endsection

