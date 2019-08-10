<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Route Model Binding | Usar otro campo que no sea id en la url
    public function getRouteKeyName()
    {
        return 'name';
    }

    // Relación Pertene a Muchos - belongsToMany
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
