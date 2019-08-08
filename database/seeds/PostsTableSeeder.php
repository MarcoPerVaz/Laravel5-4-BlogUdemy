<?php

use Illuminate\Database\Seeder;
// Importado
use App\Post;
use App\Category;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate(); //Borra la información y vuelve a crearla (Evita duplicaciones)
        Category::truncate(); //Borra la información y vuelve a crearla (Evita duplicaciones)
        // Categoría 1
        $category = new Category;
        $category->name = "Categoría 1";
        $category->save();
        // Categoría 2
        $category = new Category;
        $category->name = "Categoría 2";
        $category->save();
        // Primer post
        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = str_slug("Mi primer post");
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4); //del día cuando fue creado 4 días antes
        $post->category_id = 1;
        $post->save();
        // Segundo post
        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = str_slug("Mi segundo post");
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3); //del día cuando fue creado 3 días antes
        $post->category_id = 1;
        $post->save();
        // Tercer post
        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = str_slug("Mi tercer post");
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->published_at = Carbon::now()->subDays(2); //del día cuando fue creado 2 días antes
        $post->category_id = 1;
        $post->save();
        // Cuarto post
        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->url = str_slug("Mi cuarto post");
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post</p>";
        $post->published_at = Carbon::now()->subDays(1); //del día cuando fue creado 1 día antes
        $post->category_id = 2;
        $post->save();
        // Quinto post
        $post = new Post;
        $post->title = "Mi quinto post";
        $post->url = str_slug("Mi quinto post");
        $post->excerpt = "Extracto de mi quinto post";
        $post->body = "<p>Contenido de mi quinto post</p>";
        $post->published_at = Carbon::now(); //del día cuando fue creado
        $post->category_id = 2;
        $post->save();
    }
}
