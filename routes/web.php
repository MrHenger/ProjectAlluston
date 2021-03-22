<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\SearchController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $total = Post::count();
    $posts = Post::latest()->take(4)->get();
    /* $posts = Post::orderBy('id', 'desc')->take(4)->get(); */
    return view('welcome', compact('posts', 'total'));
})->name('welcome');

Route::get('/prueba', function () {
    $posts = Post::paginate(10);

    foreach ($posts as $post) {
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
});

Route::get('/about', function () {
    return view('about');
})->name('about');


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('can:dashboard');

Route::get('/post/list', [PostController::class, 'showList'])->name('post.list');

Route::resource('/post', PostController::class)->except('edit');

Route::resource('/admin/user', AdminUserController::class);

Route::resource('/profile', ProfileController::class)->only('show', 'edit', 'update', 'destroy');

Route::get('/search', [SearchController::class, 'search'])->name('search');
