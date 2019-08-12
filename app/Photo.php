<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Importado
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];

    // Función que elimina las imágenes del post(Reemplaza a lo del controlador Admin/PhotosController)
        protected static function boot(){
            parent::boot();

            static::deleting(function($photo){
                Storage::disk('public')->delete(str_replace('storage/', '', $photo->url));
            });
    // 
    }
}
