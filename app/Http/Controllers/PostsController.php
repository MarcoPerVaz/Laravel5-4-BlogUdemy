<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Post;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        if ( $post->isPublished() || auth()->check() ) {

            if (request()->wantsJson()) {
                return $post;
            }
            return view('posts.show', compact('post'));
        }
        abort(404);
    }
}
