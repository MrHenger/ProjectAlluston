<h2>Mostrar publicacion</h2>

<h3>{{$post->title}}</h3>

<img src="{{asset('/images/miniatures/'.$post->miniature->route_miniature)}}">

<p>{{$post->content}}</p>

@if ($post->video_id)
    <iframe width="560" height="315" src="{{$post->video->route_video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@else
    
@endif


