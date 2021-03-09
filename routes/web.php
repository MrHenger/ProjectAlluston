<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
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
    $user = User::where('id', 1)->first();

    echo $user->roles[0]['name'];
});

Route::get('/about', function () {
    return view('about');
})->name('about');


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('can:dashboard');

Route::get('/post/list', [PostController::class, 'showList'])->name('post.list');

Route::resource('/post', PostController::class);

Route::resource('admin/user', AdminUserController::class);

Route::resource('/profile', ProfileController::class)->only('show', 'edit', 'update', 'destroy');
