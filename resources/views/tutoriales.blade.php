@extends('layouts.plantilla')

@section('content')
    <div class="container min-vh-100">

        <div class="my-5">
            <form class="form-inline">
                <div class="input-group col-12 col-sm-10 col-md-8 col-lg-6 px-0">
                    <input type="text" class="form-control" placeholder="Buscar Tutorial">
                    <div class="input-group-append">
                      <button class="btn btn-info" type="button">Buscar</button>
                    </div>
                </div>                
            </form>
        </div>

        @if (isset($posts))
            <div class="row">
                
                @foreach ($posts as $post)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" >
                        <x-card :post="$post"/>
                    </div>
                @endforeach         
            </div>
            {{$posts->links()}}
        @endif
    </div>
@endsection