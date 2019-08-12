<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Importado
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id',
    ];

    protected $dates = ['published_at'];

    // Función que elimina las imágenes del post(Reemplaza a lo del controlador Admin/PhotosController)
        protected static function boot(){
            parent::boot();

            static::deleting(function($post){ //Esta función se enlaza con la función deleting del modelo Photo

                $post->tags()->detach(); //Elimina las etiquetas de todas las referencias antes de eliminar el post
                $post->photos->each->delete(); //Se usan colecciones pero usando un atajo para eliminar las imágenes

            });
        }
    // 

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

    // Mutator Puublished_at
    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ?  Carbon::parse($published_at) : null;;
    }

    // Mutator Category_id
    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) 
                                           ? $category
                                           : Category::create(['name' => $category])->id;;
    }

    // Función para guardar las etiquetas
    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });
        
        return $this->tags()->sync($tagIds);
    }
}