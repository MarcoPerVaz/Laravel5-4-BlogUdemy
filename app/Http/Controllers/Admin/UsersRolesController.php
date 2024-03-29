<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\User;

class UsersRolesController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Nota: Yo no tuve el problema al desmarcar y guardar sin permisos pero agregué la solución solo por referencia
            // Solución
            $user->roles()->detach();
            if ($request->filled('roles')) 
            {
                $user->assignRole($request->roles);
            }
        // 
        // Esto funciona para mi, pero lo hice con la forma de arriba para seguir el curso
            // $user->syncRoles($request->roles);
        // 

       return back()->withFlash('Los roles han sido actualizados');
    }

}
