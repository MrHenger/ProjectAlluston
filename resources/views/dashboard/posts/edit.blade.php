@extends('layouts.app')

@section('content')
<div class="mt-5 d-flex ml-auto">
    <div class="col-11 col-sm-10 col-lg-9 col-xl-8 mx-auto px-0 border">
        <div class="bg-light py-2 pl-4  border-bottom">
            <h2 class="font-roboto title d-inline">Editar Publicacion</h2>
        </div>
    
        <div class="mb-3 mx-3">
            <form action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
    
                <div class="mt-3">
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
    
                <div class="mt-3">
                    <label for="title">Titulo:</label>
                    <div>
                        <input class="form-control" type="text" name="title" value="{{old('title', $post->title)}}">
                    </div>
                </div>
                @error('title')
                    <div>
                        <small>*Error: {{$message}}</small>
                    </div>
                @enderror
    
                <div class="mt-3">
                    <label for="slug">Slug:</label>
                    <div>
                        <input class="form-control" type="text" name="slug" value="{{old('slug', $post->slug)}}">
                    </div>
                </div>
                @error('slug')
                    <div>
                        <small>*Error: {{$message}}</small>
                    </div>
                @enderror
    
                <div class="mt-3">
                    <label for="content">Descripcion:</label>
                    <div>
                        <textarea class="form-control" name="content" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
                    </div>
                </div>
                @error('content')
                    <div>
                        <small>*Error: {{$message}}</small>
                    </div>
                @enderror
    
                <div class="mt-3">
                    <label for="route_video">Link del video:</label>
                    <div>
                        <input class="form-control" type="text" name="route_video" value="{{old('route_video', $post->video ? $post->video->route_video : '')}}" placeholder="Ejemplo: https://www.youtube.com/embed/ZCsS1GGPrWU">
                    </div>
                </div>
                <div class="mt-3 ml-3 float-right">
                    <input class="btn btn-primary d-flex ml-auto" type="submit" value="Actualizar">
                    
                </div>
            </form>
            <div class="mt-3">
                <form action="{{route('post.destroy', $post)}}" method="POST">
                    @csrf
                    @method('delete')
                    <input class="btn btn-danger d-flex ml-auto" type="submit" value="Eliminar">
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

