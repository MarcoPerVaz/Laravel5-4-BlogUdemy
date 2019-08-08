<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Importado
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];
    protected $dates = ['published_at'];

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

    // Query Scope
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at') //Llama a todos los posts de forma descendente omitiendo los posts sin fecha(nulos) o futuros
              ->where('published_at', '<=', Carbon::now())
              ->latest('published_at');
    }
}