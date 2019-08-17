@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos personales</h3>
            </div>
            <div class="box-body">
                @if ( $errors->any() )
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>  
                    @endforeach
                </ul>
                @endif
                <form action="{{ route('admin.users.store') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    {{-- Roles --}}
                        <div class="form-group col-md-6">
                            <label>Roles</label>
                            @include('admin.roles.checkboxes')
                        </div>
                    {{-- Fin Roles --}}
                    {{-- Permissions --}}
                        <div class="form-group col-md-6">
                            <label>Permisos</label>
                            @include('admin.permissions.checkboxes')
                        </div>
                    {{-- Fin Permissions --}}

                    {{-- Password --}}
                        <span class="help-block">*La contraseña será generada y enviada al nuevo usuario vía email</span>
                    {{-- Fin Password --}}

                    <button class="btn btn-primary btn-block">Crear usuario</button>

                </form>
            </div>
            </div>
        </div>
    </div>
@endsection