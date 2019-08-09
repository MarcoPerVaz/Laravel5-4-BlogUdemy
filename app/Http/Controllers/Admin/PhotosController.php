<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// Importado
use App\Http\Controllers\Controller;
use App\Post;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo' => 'required|image|max:2048', //Cualquier extensión de una imagen
        ]);
        $photo = request()->file('photo');
    }
}
