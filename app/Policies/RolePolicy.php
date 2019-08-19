<?php

namespace App\Policies;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('View roles');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Create roles');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        // Se usa para personalizar el mensaje en caso de querer usarlo
            // if ( $user->hasRole('Admin') ) {
            //     $this->deny('No puedes actualizar este role');
            // }
        // 

        return $user->hasRole('Admin') || $user->hasPermissionTo('Update roles');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
         if ( $role->id === 1) {
            //  Funciona pero se usa la función deny() que viene con el trait use HandlesAuthorization;
                // throw new \Illuminate\Auth\Access\AuthorizationException('No se puede eliminar este role');
            // 
            $this->deny('No se puede eliminar este role');
        }

        return $user->hasRole('Admin') || $user->hasPermissionTo('Delete roles');
    }
}
