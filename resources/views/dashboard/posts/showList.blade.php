@extends('layouts.app')

@section('content')
    <div class="mt-5 ml-auto">
        <div class="mx-1">
            <h2 class="d-flex col-11 col-sm-10 col-md-8 mx-auto mt-4 font-roboto title px-0">Listado de Publicaciones</h2>
        </div>

        <div class="table-responsive mt-5 col-11 col-sm-10 col-md-8 mx-auto">
            <table class="table table-sm table-bordered">
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
                            <td class="align-middle"><a href="{{route('post.show', $post)}}">{{$post->title}}</a></td>
                            <td class="align-middle w-10px">
                                <div class="d-inline-block mb-2 mb-sm-0">
                                    <form action="{{route('post.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" title="Eliminar"><i class="icon ion-md-close"></i></button>
                                    </form>
                                </div>
                                <a class="btn btn-primary" href="{{route('post.edit', $post)}}" title="Editar"><i class="icon ion-md-create"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>


@endsection

