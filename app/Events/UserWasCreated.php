<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserWasCreated
{
    use Dispatchable, SerializesModels;
    
    //UdemyBlog
        public $user;
        public $password;
    // 

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $password) // Los parámetros que vienen del controlador Admin/UsersController de la función store
    {
        // UdemyBlog
            $this->user = $user;
            $this->password = $password;
        // 
    }

}
