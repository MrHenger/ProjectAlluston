<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminUserController;
use App\Models\Post;
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
    return view('welcome');
});

Route::get('/prueba', function () {
    if (!$video = Video::where('id', 2)->first()) {
        echo 'encontrado';
        echo var_dump($video);
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/list', [PostController::class, 'showList'])->name('post.list');

Route::resource('/post', PostController::class);

Route::resource('/user', AdminUserController::class);
