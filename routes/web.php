<?php

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

// Ruta por defecto
Route::get('/', function () {
    $posts = App\Post::all();//Lama a todos los posts
    $posts = App\Post::latest('published_at')->get();//Lama a todos los posts de forma descendente
    return view('welcome', compact('posts'));
});
// Ruta admin
Route::get('admin', function () {
    return view('admin.dashboard');
});
