<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Post;
use App\User;
use App\Category;

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
        $archive = Post::selectRaw('year(published_at) as year')
                    ->selectRaw('monthname(published_at) as month')
                    ->selectRaw('count(*) as posts')
                    ->groupBy('year', 'month')
                    ->orderBy('published_at')
                    ->get();

        return view('pages.archive', [
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::latest()->take(7)->get(),
            'posts' => Post::latest()->take(5)->get(),
            'archive' => $archive
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
