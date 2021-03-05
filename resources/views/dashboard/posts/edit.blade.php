@extends('layouts.app')

@section('content')
    <h2>Editar publicacion</h2>

    <div>
        <form action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div>
                <label for="route_miniature">Miniatura:</label>
                <img src="{{asset('/images/miniatures/'.$post->miniature->route_miniature)}}" height="100">
                <div>
                    <input type="file" name="route_miniature">
                </div>
            </div>
            @error('route_miniature')
                <div>
                    <small>*Error: {{$message}}</small>
                </div>
            @enderror

            <div>
                <label for="title">Titulo:</label>
                <div>
                    <input type="text" name="title" value="{{old('title', $post->title)}}">
                </div>
            </div>
            @error('title')
                <div>
                    <small>*Error: {{$message}}</small>
                </div>
            @enderror

            <div>
                <label for="slug">Slug:</label>
                <div>
                    <input type="text" name="slug" value="{{old('slug', $post->slug)}}">
                </div>
            </div>
            @error('slug')
                <div>
                    <small>*Error: {{$message}}</small>
                </div>
            @enderror

            <div>
                <label for="content">Descripcion:</label>
                <div>
                    <textarea name="content" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
                </div>
            </div>
            @error('content')
                <div>
                    <small>*Error: {{$message}}</small>
                </div>
            @enderror

            <div>
                <label for="route_video">Link del video:</label>
                <div>
                    <input type="text" name="route_video" value="{{old('route_video', $post->video ? $post->video->route_video : '')}}" placeholder="Ejemplo: https://www.youtube.com/embed/ZCsS1GGPrWU">
                </div>
            </div>
            <div>
                <input type="submit" value="Actualizar">
                <input type="reset" value="Limpiar">
            </div>
        </form>
    </div>
@endsection

