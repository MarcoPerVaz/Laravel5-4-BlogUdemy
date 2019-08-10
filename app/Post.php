<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Importado
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];
    protected $dates = ['published_at'];

    // Route Model Binding | Usar otro campo que no sea id en la url
    public function getRouteKeyName()
    {
        return 'url';
    }

    // Relación Uno a Muchos - belongsTo
    public function category()
    {
        return $this->belongsTo(Category::class); //Para poder usar $post->category->name
    }

    // Relación Muchos a Muchos - belongsToMany
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relación Tiene Muchos - hasMany
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    // Query Scope
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at') //Llama a todos los posts de forma descendente omitiendo los posts sin fecha(nulos) o futuros
              ->where('published_at', '<=', Carbon::now())
              ->latest('published_at');
    }

    // Mutator Title
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }
}