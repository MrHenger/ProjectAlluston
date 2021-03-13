<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->get('term');

        $posts = Post::where('title', 'like', '%' . $term . '%')->get();

        $data = [];

        foreach ($posts as $post) {
            $data[] = [
                'label' => $post->title,
            ];
        }

        return $data;
    }
}
