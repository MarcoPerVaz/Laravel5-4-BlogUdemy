<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    // BlogUdemy
        public function before($user)
        {
            // Si el usuario tiene el role Admin puede editar todos los posts
            if ($user->hasRole('Admin')) {
                return true;
            }
        }
    // 

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $authUser, User $user)
    {
        // BlogUdemy
            return $authUser->id === $user->id || $user->hasPermissionTo('View users');
        // 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Update users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Delete users');
    }
}
