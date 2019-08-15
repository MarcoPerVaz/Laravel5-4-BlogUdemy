<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        // Esta lógica fue pasada a la función allowed del modelo Post
            // if (auth()->user()->hasRole('Admin')) {
            //     $posts = Post::all();
            // }
            // else {
            //     // $posts = Post::where('user_id', auth()->id())->get();
            //     $posts = auth()->user()->posts;
            // }
        // 

        $posts = Post::allowed()->get(); //Función Scope creada en el modelo Post para verificar que posts puede ver el usuario dependiendo el Role
        return view('admin.posts.index', compact('posts'));
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);

        $this->validate($request, ['title' => 'required|min:3']);

        // $post = Post::create($request->only('title'));
        $post = Post::create( $request->all());

        // Esto crea las url's únicas (funciona) pero fue pasado al modelo Post a la función create
            // $post->url = str_slug($request->get('title')) . "-{$post->id}"; 
            // $post->save();

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);

        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all()
         ]);
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        // Guardar etiquetas usando la función que está en el modelo Post
        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'La publicación ha sido guardada');
    }

    public function destroy(Post $post)
    {
        // //Elimina las etiquetas de todas las referencias antes de eliminar el post
            // $post->tags()->detach(); //Fue pasado a la función boot del modelo Post
        // 

            // $post->photos()->delete(); //Borra las imágenes de la Bd pero no de la carpeta Storage(Funciona)

            // Este foreach si elimina y si ejecuta la función estática boot del modelo Post (Funciona)
            //     foreach ($post->photos as $photo) {
            //         $photo->delete();
            //     }
            

            // Se usan colecciones para eliminar las imágenes y si ejecuta la función estática boot del modelo Post (Funciona)
            //     $post->photos->each(function(){
            //         $photo->delete();
            //     });
            

        // Se usan colecciones pero usando un atajo para eliminar las imágenes y si ejecuta la función estática boot del modelo Post (Funciona)
            // $post->photos->each->delete(); //Fue pasado a la función boot del modelo Post
        // 



        // NOTA: Se creo la función boot en el modelo Post y por eso solo quedo el delete aquí
        $post->delete(); //Elimina el post

        $this->authorize('delete', $post);

        return redirect()->route('admin.posts.index')->with('flash', 'La publicación ha sido eliminada');
    }
}
