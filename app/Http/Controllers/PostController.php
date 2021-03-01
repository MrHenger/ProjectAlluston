<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Miniature;
use App\Models\Video;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = $request->all();

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

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.List');
    }

    public function showList()
    {
        $posts = Post::all();
        return view('dashboard.posts.showList', compact('posts'));
    }
}
