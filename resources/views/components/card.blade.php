
<div class="card shadow mb-5 ">
    <img src="{{asset('/images/miniatures/'.$post->miniature->route_miniature)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title probando" title="{{$post->title}}"><a class="card-link" href="{{route('post.show', $post)}}">{{$post->title}}</a></h5>
        {{-- <p class="card-text">{{$slot}}</p> --}}

        <div class="mb-3">
            Autor: {{$post->user['name']}}
        </div>

        <div class="text-center">
            <a href="{{route('post.show', $post)}}" class="btn btn-primary">Mas Informacion</a>
        </div>        
    </div>
</div>
