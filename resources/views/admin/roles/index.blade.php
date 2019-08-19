@extends('admin.layout')

@section('header')
    <h1>
     Roles
      <small>listado</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Usuarios</li>
    </ol>
@endsection

{{-- DataTable --}}
@section('content')
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Listado de roles</h3>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i> Crear role
        </a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="roles-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Identificador</th>
              <th>Nombre</th>
              <th>Permisos</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->display_name }}</td>
                  <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
                  <td>

                    <a href="{{ route('admin.roles.show', $role) }}" 
                      class="btn btn-xs btn-default">
                      <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.roles.edit', $role) }}" 
                       class="btn btn-xs btn-info"><i class="fa fa-pencil"></i>
                    </a>

                    <form action="{{ route('admin.roles.destroy', $role) }}" method="post" style="display: inline;">
                      {{ csrf_field() }} {{ method_field('DELETE') }}
                      <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este role?')">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>

                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $('#roles-table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@endpush