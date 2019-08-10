<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo' => 'required|image|max:2048', //Cualquier extensión de una imagen
        ]);
        $photo = request()->file('photo')->store('public');
        Photo::create([
            'url' => Storage::url($photo),
            'post_id' => $post->id
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        $photoPath = str_replace('storage', 'public', $photo->url); //Reemplaza storage de la url por public
        Storage::delete($photoPath);
        return back()->with('flash', 'Foto eliminada');
    }
}
