@extends('layouts.app')

@section('content')
    <div class="mt-5 ml-auto">
        <div class="mx-1">
            <h2 class="d-flex col-11 col-sm-10 col-md-8 mx-auto mt-4 font-roboto title px-0">
                Listado de Publicaciones
            </h2>
        </div>

        <posts-list raiz="{{asset('/images/miniatures/')}}"></posts-list>
    </div>
@endsection

