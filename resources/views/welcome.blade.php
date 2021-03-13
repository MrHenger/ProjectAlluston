@extends('layouts.plantilla')

@section('content')
    <div class="cover">
        <div class="container">
            <h2 class="font-roboto">Alluston</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed debitis, exercitationem qui pariatur hic ratione incidunt facere vero vitae, quia odio nisi fugit. Odit perspiciatis officiis inventore velit aliquid debitis?
            </p>
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group col-11 col-md-8 ">
                    <input id="search" type="text" class="form-control ui-autocomplete-input" placeholder="Buscar Tutorial">
                    <div class="input-group-append">
                      <button class="btn btn-info" type="button">Buscar</button>
                    </div>
                </div>                
            </form>
        </div>
    </div>

    <div class="mb-3">
        <div class="container">
            <h2 class="mt-5 text-center font-roboto">CONTENIDO</h2>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 mb-5 p-3">
                    <div class="mb-3">
                        <img class="col-12" src="{{asset('/images/tutoriales.jpg')}}">
                    </div>
                    <div>
                        <h3 class="text-center">Tutoriales Dinaminacos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia magnam iste dolore dicta possimus, nemo iusto. Corporis perspiciatis delectus illo</p>
                    </div>
                </div>
    
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 mb-5  p-3 ">
                    <div class="mb-3">
                        <img class="col-12" src="{{asset('/images/software.jpg')}}" >
                    </div>
                    <div>
                        <h3 class="text-center">Software Actualizado</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia magnam iste dolore dicta possimus, nemo iusto. Corporis perspiciatis delectus illo</p>
                    </div>
                </div>
    
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 mb-5  p-3">
                    <div class="mb-3">
                        <img class="col-12" src="{{asset('/images/cuidado.jpg')}}" >
                    </div>
                    <div>
                        <h3 class="text-center">Bienestar de tu PC</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia magnam iste dolore dicta possimus, nemo iusto. Corporis perspiciatis delectus illo</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="bg-azul">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-5">
                    <h2 class="font-roboto">¿Buscas Algun Tutorial?</h2>
                    <p>Visita la seccion de tutoriales</p>
                    <a class="btn btn-info" href="{{route('post.index')}}">Tutoriales</a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container">
            <h2 class="font-roboto text-center my-5">ULTIMOS TUTORIALES</h2>
            <div class="row">
                @if (isset($posts))
                    @foreach ($posts as $post)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3" >
                            <x-card :post="$post"/>
                        </div>
                    @endforeach  
                @endif
                       
            </div>
        </div>
    </div>

    <div class="bg-azul">
        <div >
            <div class="row">
                <div class="col-12 col-lg-7 px-0">
                    <img class="col-12" src="{{asset('/images/section_contenido.jpg')}}">
                </div>
                <div class="col-11 col-lg-5 text-center mx-auto mt-lg-4 mt-xl-5">
                    <h2 class="font-roboto my-4">TOTAL DE CONTENIDO</h2>
                    <div class="row my-auto">
                        <div class="col-12 col-lg-6 mx-auto">
                            <div class="border border-white py-3 mb-4">
                                <h2 class="mb-2">{{$total}}</h2>
                                <p>Tutoriales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    {{-- <img class="cover" src="{{asset('/images/work.jpg')}}" title="Imagen de tookapic en Pixabay" > --}}
@endsection