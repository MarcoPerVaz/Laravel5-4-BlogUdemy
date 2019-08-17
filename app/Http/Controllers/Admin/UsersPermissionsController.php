<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\User;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        // Nota: Yo no tuve el problema al desmarcar y guardar sin permisos pero agregué la solución solo por referencia
            // Solución
            $user->permissions()->detach();
            if ($request->filled('permissions')) 
            {
                $user->givePermissionTo($request->permissions);
            }
        // 

        // Esto funciona para mi, pero lo hice con la forma de arriba para seguir el curso
            // $user->syncPermissions($request->permissions);
        // 

        return back()->withFlash('Los permisos han sido actualizados');
    }
}
