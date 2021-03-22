<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Miniature;
use App\Models\Video;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:post.list')->only('showList');
        $this->middleware('can:post.edit')->only('edit', 'update');
        $this->middleware('can:post.create')->only('create', 'store');
        $this->middleware('can:post.destroy')->only('destroy');
    }

    public function index()
    {
        $posts = Post::paginate(12);

        return view('tutoriales', compact('posts'));
    }


    public function create()
    {
        return view('dashboard.posts.create');
    }


    public function store(PostStoreRequest $request)
    {
        $post = $request->all();

        $post['user_id'] = Auth::user()->id;

        //CREAR LA MINIATURA DE LA PUBLICACION
        if ($archivo = $request->file('route_miniature')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images/miniatures', $nombre);

            $miniature = Miniature::create(['route_miniature' => $nombre]);

            $post['miniature_id'] = $miniature->id;
        }

        //CREAR LA RUTA DEL VIDEO
        if (isset($post['route_video'])) {
            $video = Video::create(['route_video' => $post['route_video']]);

            $post['video_id'] = $video->id;
        }

        Post::create($post); //CREAR LA PUBLICACION

        return redirect()->route('post.list');
    }


    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }


    public function update(PostUpdateRequest $request)
    {
        $postUpdate = $request->all();

        $post = Post::find($postUpdate['id']);

        /* ****LA FUNCION DE EDITAR LA MINIATURA DE MOMENTO NO ESTA DISPONIBLE*** */

        //ACTUALIZAR MINIATURA DE LA PUBLICACION
        /* if ($archivo = $request->file('route_miniature')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images/miniatures', $nombre);

            $miniature = Miniature::create(['route_miniature' => $nombre]);

            $postUpdate['miniature_id'] = $miniature->id;
        } */

        //ACTUALIZAR LA RUTA DEL VIDEO
        $videoUpdate = $postUpdate['video'];
        if (isset($videoUpdate['route_video'])) { //SI SE INSERTA UN NUEVO REGISTRO
            if (($video = Video::where('id', $post->video_id)->first()) == null) { //SI NO EXISTIA UN REGISTRO PREVIO

                $video = Video::create(['route_video' => $videoUpdate['route_video']]);
                $postUpdate['video_id'] = $video->id;
            } else { //SI YA EXISTIA UN REGISTRO PREVIO
                $video->update(['route_video' => $videoUpdate['route_video']]);
            }
        } else { //SI NO SE INSERTA UN NUEVO REGISTRO
            if (($video = Video::where('id', $post->video_id)->first()) != null) { //SI YA EXISTIA UN REGISTRO PREVIO
                $video->delete();
                $postUpdate['video_id'] = null;
            }
        }

        $post->update($postUpdate); //ACTUALIZAR PUBLICACION

        //Llamar las relaciones de la variable post para que se pasen en formato JSON
        $post->miniture;
        $post->video;
        $post->user;

        return $post;
    }


    public function destroy(Post $post)
    {
        $post->delete();
    }

    public function showList(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::paginate(10);

            foreach ($posts as $post) {
                //Llamar las relaciones de la variable post para que se pasen en formato JSON
                $post->miniature;
                $post->video;
                $post->user;
            }

            return [
                'paginate' => [
                    'total' => $posts->total(),
                    'current_page' => $posts->currentPage(),
                    'per_page' => $posts->perPage(),
                    'last_page' => $posts->lastPage(),
                    'from' => $posts->firstItem(),
                    'to' => $posts->lastPage(),
                ],
                'posts' => $posts,
            ];
        } else {
            return view('dashboard.posts.showList');
        }
    }
}
