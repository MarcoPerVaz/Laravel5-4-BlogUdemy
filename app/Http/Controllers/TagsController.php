<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->published()->paginate();
        if (request()->wantsJson()) {
            return $posts;
        }
        return view('pages.home', [
            'title' => "Publicaciones de la etiqueta '{$tag->name}'",
            'posts' => $posts
        ]);
    }
}
