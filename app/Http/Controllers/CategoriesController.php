<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importado
use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        return view('welcome', [
            'category' => $category,
            'posts' => $category->posts()->paginate()
        ]);
    }
}
