<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Post;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::published()->paginate(); //Si paginate() no tiene número entonces por defecto son 15 ->paginate(15)

        return view('welcome', compact('posts'));   
    }
}
