<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginCredentials
{
    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        // Prueba para ver que regresa el listener al momento de crear un usuario
            // -Se llena el usuario y el email y click en el botón de crear usuario
            // dd($event->user->toArray(), $event->password);
            
        // Enviar el email con las credenciales del usuario
    }
}
