@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Actualizar Role</h3>
            </div>
            <div class="box-body">
                @include('partials.error-messages')
                <form action="{{ route('admin.roles.update', $role) }}" method="post">
                    {{ method_field('PUT') }}

                    @include('admin.roles.form')

                    <button class="btn btn-primary btn-block">Actualizar role</button>

                </form>
            </div>
            </div>
        </div>
    </div>
@endsection