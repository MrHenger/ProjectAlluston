@extends('layouts.app')

@section('content')
    <div class="mt-5 d-flex ml-auto">
        <div class="col-11 col-sm-10 col-lg-9 col-xl-8 mx-auto px-0 border">
            <div class="bg-light py-2 pl-4  border-bottom">
                <h2 class="font-roboto title d-inline">Crear publicacion</h2>
            </div>

            <div class="container mb-3">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <div class="mt-3">
                        <label class="form-label" for="route_miniature">Miniatura:</label>
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
                        <label class="form-label" for="title">Titulo:</label>
                        <div>
                            <input class="form-control" type="text" name="title" value="{{old('title')}}">
                        </div>
                    </div>
                    @error('title')
                        <div>
                            <small>*Error: {{$message}}</small>
                        </div>
                    @enderror
        
                    <div class="mt-3">
                        <label class="form-label" for="slug">Slug:</label>
                        <div>
                            <input class="form-control" type="text" name="slug" value="{{old('slug')}}">
                        </div>
                    </div>
                    @error('slug')
                        <div>
                            <small>*Error: {{$message}}</small>
                        </div>
                    @enderror
        
                    <div class="mt-3">
                        <label class="form-label" for="content">Descripcion:</label>
                        <div>
                            <textarea class="form-control" name="content" cols="30" rows="10">{{old('content')}}</textarea>
                        </div>
                    </div>
                    @error('content')
                        <div>
                            <small>*Error: {{$message}}</small>
                        </div>
                    @enderror
        
                    <div class="mt-3">
                        <label class="form-label" for="route_video">Link del video:</label>
                        <div>
                            <input class="form-control" type="text" name="route_video" value="{{old('route_video')}}" placeholder="Ejemplo: https://www.youtube.com/embed/ZCsS1GGPrWU">
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <input class="btn btn-primary" type="reset" value="Limpiar">
                        <input class="btn btn-primary" type="submit" value="Crear">                        
                    </div>
                </form>
            </div>
        </div>
    </div>

        

    
@endsection

