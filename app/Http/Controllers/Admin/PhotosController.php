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
        // Creando la imagen mediante el modelo Photo(Funciona)
            // $photo = request()->file('photo')->store('public')
            // Photo::create([
            //     'url' => Storage::url(request()->file('photo')->store('posts', 'public')),
            //     'post_id' => $post->id
            // ]);

        // Creando la imagen mediante la relación de Eloquent(Funciona y el id va implícito)
        $post->photos()->create([
            'url' => Storage::url(request()->file('photo')->store('posts', 'public')),
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        // Funciona
        // $photoPath = str_replace('storage', 'public', $photo->url); //Reemplaza storage de la url por public
        // Storage::delete($photoPath);

        // Funciona pero fue pasado al modelo Photo
        // Storage::disk('public')->delete(str_replace('storage/', '', $photo->url));
        return back()->with('flash', 'Foto eliminada');
    }
}
