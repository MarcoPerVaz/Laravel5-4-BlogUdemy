<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\User;
use Spatie\Permission\Models\Role;
// use Illuminate\Validation\Rule; // No se usa porque se pasó a UpdateUserRequest
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use App\Events\UserWasCreated;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Función Scope query creada en el modelo User para verificar si el usuario puede ver a los usuarios creados
            $users = User::allowed()->get(); 
        // 
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $user);
        $user = new User;
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

        // Validar el formulario
        $data = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                ]);
                
        // Generar una contraseña
        $data['password'] = str_random(8); //Cadena aleatoria de 8 caracteres

        // Creamos el usuario
        $user = User::create($data);

        // Asignamos los roles
        if ( $request->filled('roles') ) {
            $user->assignRole($request->roles);
        }
            // Funciona para mi, pero en el curso dio error e hice el if de arriba para copiar al curso
                // $user->assignRole($request->roles);

        // Asignamos los permisos
        if ( $request->filled('permissions') ) {
            $user->givePermissionTo($request->permissions);
        }
            // Funciona para mi, pero en el curso dio error e hice el if de arriba para copiar al curso
                // $user->givePermissionTo($request->permissions);

        // Enviamos el email
        UserWasCreated::dispatch($user, $data['password']);

        // Regresamos al usuario
        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Funciona pero se ha pasado a UpdateUserRequest
            // $rules = [
            //     'name' => 'required',
            //     'email' => ['required', Rule::unique('users')->ignore(($user->id))],
            // ];

            // if ($request->filled('password')) {
            //     $rules['password'] = ['confirmed', 'min:6'];
            // }
            
            // $user->update($request->validate ($rules));
        // 
        $this->authorize('update', $user);

        $user->update( $request->validated() );

        return back()->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
