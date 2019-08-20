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
        // Funciona pero las relaciones usando with se pasaron al modleo Post en la propiedad $with(por estabilidad se paso a la función published 
            // del modelo Post)
                // $query = Post::with(['category', 'tags', 'owner', 'photos'])->published(); //Consulta con precarga de consultas
                $query = Post::published(); //Consulta con carga de consultas repetidas
        // 

        if (request('month')) {
            $query->whereMonth('published_at', request('month'));
        }

        if (request('year')) {
            $query->whereYear('published_at', request('year'));
        }

        $posts = $query->paginate(); //Si paginate() no tiene número entonces por defecto son 15 ->paginate(15)

        // return $posts;
        return view('pages.home', compact('posts'));   
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        // Sirve para cambiar los meses a español - Funciona pero fue pasado a Providers/AppServiceProvider.php
            // \DB::statement("SET lc_time_names = 'es_ES'");
        // 

        // Funciona pero fue pasado a un Scope query llamada scopebyYearAndMonth
            // $archive = Post::selectRaw('year(published_at) as year')
            //             ->selectRaw('month(published_at) as month')
            //             ->selectRaw('monthname(published_at) as monthname')
            //             ->selectRaw('count(*) as posts')
            //             ->groupBy('year', 'month', 'month')
            //             ->orderBy('published_at')
            //             ->get();
        // 
        $archive = Post::published()->byYearAndMonth(); //Query scope que viene del modelo Post scopebyYearAndMonth

        return view('pages.archive', [
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::latest()->take(7)->get(),
            'posts' => Post::latest('published_at')->take(5)->get(),
            'archive' => $archive
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
