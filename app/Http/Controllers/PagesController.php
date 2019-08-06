<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Post;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::all();//Lama a todos los posts
        $posts = Post::latest('published_at')->get();//Lama a todos los posts de forma descendente
        return view('welcome', compact('posts'));   
    }
}
