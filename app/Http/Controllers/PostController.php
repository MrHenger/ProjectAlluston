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


    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', compact('post'));
    }


    public function update(PostUpdateRequest $request, Post $post)
    {
        $postUpdate = $request->all();


        //ACTUALIZAR MINIATURA DE LA PUBLICACION
        if ($archivo = $request->file('route_miniature')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images/miniatures', $nombre);

            $miniature = Miniature::create(['route_miniature' => $nombre]);

            $postUpdate['miniature_id'] = $miniature->id;
        }

        //ACTUALIZAR LA RUTA DEL VIDEO
        if (isset($postUpdate['route_video'])) { //SI SE INSERTA UN NUEVO REGISTRO
            if (($video = Video::where('id', $post->video_id)->first()) == null) { //SI NO EXISTIA UN REGISTRO PREVIO

                $video = Video::create(['route_video' => $postUpdate['route_video']]);
                $postUpdate['video_id'] = $video->id;
            } else { //SI YA EXISTIA UN REGISTRO PREVIO
                $video->update(['route_video' => $postUpdate['route_video']]);
            }
        } else { //SI NO SE INSERTA UN NUEVO REGISTRO
            if (($video = Video::where('id', $post->video_id)->first()) != null) { //SI YA EXISTIA UN REGISTRO PREVIO
                $video->delete();
                $postUpdate['video_id'] = null;
            }
        }

        $post->update($postUpdate); //ACTUALIZAR PUBLICACION

        return view('dashboard.posts.show', compact('post'));
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.List');
    }

    public function showList()
    {
        $posts = Post::paginate(20);
        return view('dashboard.posts.showList', compact('posts'));
    }
}
