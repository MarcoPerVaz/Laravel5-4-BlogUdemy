<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\SaveRolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Role);

        return view('admin.roles.index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $role = New Role);

        return view('admin.roles.create', [

            'role' => $role,
            'permissions' => Permission::pluck('name', 'id'),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        /// Se ha pasado a SaveRolesRequest
            // $data = $request->validate([
            //             'name' => 'required|unique:roles',
            //             'display_name' => 'required',
            //         ], [
            //                 'name.required' => 'El campo identificador es obligatorio',
            //                 'name.unique' => 'Este identificador ya ha sido registrado',
            //                 'display_name.required' => 'El campo nombre es obligatorio',
            //         ]);
            // $role = Role::create($data);
        // 

        $this->authorize('create', New Role);

        $role = Role::create($request->validated());

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El role fue creado correctamente');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        // Se ha pasado a SaveRolesRequest
            // $data = $request->validate(['display_name' => 'required'], 
            //             [
            //                 'display_name.required' => 'El campo nombre es obligatorio.'
            //             ]
            //         );
            // $role->update($data);
        // 
        
        // Se puede usar el authorize en SaveRolesRequest, solo comentando esta línea y descomentando lo del formRequest
            $this->authorize('update', $role);
        // 

        $role->update($request->validated());

        $role->permissions()->detach();

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.edit', $role)->withFlash('El role fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Funciona pero fue pasado a una política RolePolicy
            // if ( $role->id === 1) {
            //     throw new \Illuminate\Auth\Access\AuthorizationException('No se puede eliminar este role');
            // }
        // 

        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado');
    }
}
