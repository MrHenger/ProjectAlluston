@extends('layouts.plantilla')

@section('content')
    <div class="container">
        <h2 class="font-roboto my-5">{{$post->title}}</h2>

        <div class="row">
            <img class="col-10 mx-auto"src="{{asset('/images/miniatures/'.$post->miniature->route_miniature)}}">
        </div>
        

        <div class="my-5">
            <p class="indent">{{$post->content}}</p>
        </div>
        

        @if ($post->video_id)
            <div class="row">
                <iframe class="mx-auto" width="560" height="315" src="{{$post->video->route_video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
        @else
            
        @endif

        <div class="border my-5">
            <div class="bg-light">
                <h3 class="p-3 font-roboto">Comentarios</h3>
            </div>

            <div></div>
        </div>
    </div>
@endsection




