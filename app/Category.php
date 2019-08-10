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
        return 'url';
    }

    // Relación Tiene Muchos - hasMany
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Mutator Name
    public function setNameAttribute($name)
    {
       $this->attributes['name'] = $name;
       $this->attributes['url'] = str_slug($name);
    }
}
