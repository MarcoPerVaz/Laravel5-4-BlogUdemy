@extends('admin.layout')

@section('content')
<div class="row">
  {{-- Profile --}}
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Datos personales</h3>
      </div>
      <div class="box-body">
        @include('partials.error-messages')
        <form action="{{ route('admin.users.update', $user) }}" method="post">
          {{ csrf_field() }} {{ method_field('PUT') }}

          <div class="form-group">
            <label for="name">Nombre:</label>
            <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" value="{{ old('email', $user->email) }}" class="form-control">
          </div>
          
          <div class="form-group">
            <label for="password_confirmation">Contraseña:</label>
            <input name="password" type="password" placeholder="Contraseña " class="form-control">
            <span class="help-block">*Dejar en blanco para no cambiar la contraseña</span>
          </div>
          
          <div class="form-group">
            <label for="password">Repite la contraseña:</label>
            <input name="password_confirmation" type="password" placeholder="Repita la contraseña" class="form-control">
          </div>

          <button class="btn btn-primary btn-block">Actualizar usuario</button>

        </form>
      </div>
    </div>
  </div>
  {{-- Fin Profile --}}
  {{-- Roles --}}
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Roles</h3>
      </div>
       @role('Admin')
        <form action="{{ route('admin.users.roles.update', $user) }}" method="post">
          {{ csrf_field() }} {{ method_field('PUT') }}
          <div class="box-body">
            
            @include('admin.roles.checkboxes')

          </div>
          <button class="btn btn-primary btn-block">Actualizar roles</button>
        </form>
       @else
         <ul class="list-group">
          @forelse ($user->roles as $role)
            <li class="list-group-item">{{ $role->name }}</li>    
          @empty
            <li class="list-group-item">No tiene roles</li>   
          @endforelse
        </ul>
      @endrole
    </div>
    {{-- Fin Roles --}}
    {{-- Permisos --}}
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Permisos</h3>
      </div>
      @role('Admin')
        <form action="{{ route('admin.users.permissions.update', $user) }}" method="post">
          {{ csrf_field() }} {{ method_field('PUT') }}
          <div class="box-body">
            
            @include('admin.permissions.checkboxes', ['model' => $user])

          </div>
          <button class="btn btn-primary btn-block">Actualizar permisos</button>
        </form>
      @else
        <ul class="list-group">
          @forelse ($user->permissions as $permission)
            <li class="list-group-item">{{ $permission->name }}</li>    
          @empty
            <li class="list-group-item">No tiene permisos</li>
          @endforelse
        </ul>
      @endrole
    </div>
    {{-- Fin Permisos --}}
  </div>
</div>
@endsection