@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Role</h3>
            </div>
            <div class="box-body">
                @include('partials.error-messages')
                <form action="{{ route('admin.roles.store') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Guard:</label>
                        <select name="guard_name" id="" class="form-control">
                          @foreach (config('auth.guards') as $guardName => $guard)
                              <option {{ old('guard_name') === $guardName ? 'selected' : '' }} 
                              value="{{ $guardName }}">{{ $guardName }}</option>
                          @endforeach
                        </select>
                    </div>
                    {{-- Permissions --}}
                        <div class="form-group col-md-6">
                            <label>Permisos</label>
                            @include('admin.permissions.checkboxes', ['model' => $role])
                        </div>
                    {{-- Fin Permissions --}}

                    <button class="btn btn-primary btn-block">Crear role</button>

                </form>
            </div>
            </div>
        </div>
    </div>
@endsection