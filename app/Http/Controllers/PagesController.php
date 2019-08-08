<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Post;

class PagesController extends Controller
{
    public function home()
    {
        // Este código funciona pero se realizó usando Query Scopes
            // $posts = Post::all();//Llama a todos los posts
            // $posts = Post::latest('published_at')->get();//Llama a todos los posts de forma descendente
            // $posts = Post::whereNotNull('published_at') //Llama a todos los posts de forma descendente omitiendo los posts sin fecha(nulos)
            //         ->latest('published_at')
            //         ->get();
            // $posts = Post::whereNotNull('published_at') //Llama a todos los posts de forma descendente omitiendo los posts sin fecha(nulos) o futuros
            //         ->where('published_at', '<=', Carbon::now())
            //         ->latest('published_at')
            //         ->get();
        // 
        $posts = Post::published()->get();
        return view('welcome', compact('posts'));   
    }
}
