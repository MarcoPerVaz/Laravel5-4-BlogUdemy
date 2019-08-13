<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Importado
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 'user_id',
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

    // Relación Pertenece a - belongsTo
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Query Scope
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at') //Llama a todos los posts de forma descendente omitiendo los posts sin fecha(nulos) o futuros
              ->where('published_at', '<=', Carbon::now())
              ->latest('published_at');
    }

    // Verifica si el post es público
    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today(); //Devuelve verdadero o falso si el post tiene fecha o fechat futura
    }

    // Sobreescribe al método create usado en el controlador
    public static function create(array $attributes = [])
    {
        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public function generateUrl()
    {
        $url = str_slug($this->title); 

        if ($this::whereUrl($url)->exists()) {
            $url = "{$url}-{$this->id}"; 
        }
        $this->url = $url;
        $this->save();
    }
    // Mutator Title
    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = $title;

    //     $this->attributes['url'] = $url;
    // }

    // Mutator Published_at
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

    // Función para integrar Vistas Polimórficas
    public function viewType($home = '')
    {
        if ($this->photos->count() === 1):

            return 'posts.photo';
                
        elseif($this->photos->count() > 1):
        
            return $home === 'home' ? 'posts.carousel-preview' : 'posts.carousel';

        elseif($this->iframe):

            return 'posts.iframe';
        
        else:

            return 'posts.text';
            
        endif;
    }
}