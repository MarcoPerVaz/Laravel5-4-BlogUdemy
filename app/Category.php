<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Importado
use App\Post;

class Category extends Model
{
     // Route Model Binding | Usar otro campo que no sea id en la url
    public function getRouteKeyName()
    {
        return 'name';
    }

    // Relación Tiene Muchos - hasMany
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
