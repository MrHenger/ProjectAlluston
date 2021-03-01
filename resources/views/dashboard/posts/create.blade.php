<h1>crear publicacion</h1>

<div>
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="route_miniature">Miniatura:</label>
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
                <input type="text" name="title" value="{{old('title')}}">
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
                <input type="text" name="slug" value="{{old('slug')}}">
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
                <textarea name="content" cols="30" rows="10">{{old('content')}}</textarea>
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
                <input type="text" name="route_video" value="{{old('route_video')}}" placeholder="Ejemplo: https://www.youtube.com/embed/ZCsS1GGPrWU">
            </div>
        </div>
        <div>
            <input type="submit" value="Crear">
            <input type="reset" value="Limpiar">
        </div>
    </form>
</div>