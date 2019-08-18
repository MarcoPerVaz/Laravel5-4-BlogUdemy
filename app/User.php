<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// Importado
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Función mutator setPasswordAttribute
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Relación Tiene Muchos - hasMany 
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Función Query Scope
    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this)) { 
            return $query;
        }
        
        return $query->where('id', auth()->id());
    }
}
