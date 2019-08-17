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
       $user->syncRoles($request->roles);

       return back()->withFlash('Los roles han sido actualizados');
    }

}
