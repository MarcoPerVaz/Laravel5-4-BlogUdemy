<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        return view('pages.home', [
            'title' => "Publicaciones de la categoría '{$category->name}'",
            'posts' => $category->posts()->published()->paginate()
        ]);
    }
}
