@extends('layouts.profile')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-12 col-lg-3 border-right">
                <div class="row">
                    <div class="col-4 col-lg-12">
                        <img class="col-12 image-round px-0" src="{{asset('/images/photo/'.$user->photo->route_photo)}}" alt="Foto de perfil">
                        <div class="text-center mt-3">
                            <a class="btn btn-outline-info" href="{{route('profile.edit', $user)}}">Editar perfil</a>
                        </div>
                    </div>
                    <div class="col-8 col-lg-12 mt-3">
                        <h3 class="font-roboto">{{$user->name}}</h3>
                        <div class="my-3">
                            <p>{{$user->email}}</p>
                        </div>
                        @can('post.create')
                            <div class="my-3">
                                <p>Publicaciones: {{$nPost}}</p>
                            </div>
                        @endcan
                    </div>
                    
                </div>  
            </div> 
            <div class="col-12 col-lg-9">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore blanditiis atque, nam temporibus voluptas hic aliquid quidem excepturi harum, suscipit ullam debitis libero molestias aperiam minus adipisci saepe quibusdam enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quod nisi dignissimos voluptatem natus non tempore quibusdam reiciendis doloribus. Vel iste quam aperiam quasi obcaecati magni dolorum excepturi voluptas cumque!</p>
            </div>               
        </div>
    </div>
    
@endsection