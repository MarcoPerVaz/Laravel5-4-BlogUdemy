<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Deshabilitar la protección contra asignación masiva
    protected $guarded = [];
    
    // Route Model Binding | Usar otro campo que no sea id en la url
    public function getRouteKeyName()
    {
        return 'url';
    }

    // Relación Pertene a Muchos - belongsToMany
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // Mutator Name
    public function setNameAttribute($name)
    {
       $this->attributes['name'] = $name;
       $this->attributes['url'] = str_slug($name);
    }
}
