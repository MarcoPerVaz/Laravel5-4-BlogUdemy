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

        return view('pages.home', compact('posts'));   
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        return view('pages.archive');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
