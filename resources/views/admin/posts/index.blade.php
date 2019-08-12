@extends('admin.layout')

@section('header')
    <h1>
     Posts
      <small>listado</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Posts</li>
    </ol>
@endsection

{{-- DataTable --}}
@section('content')
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Listado de publicaciones</h3>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
          <i class="fa fa-plus"></i> Crear publicación
        </button>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="posts-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Extracto</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->excerpt }}</td>
                  <td>

                    <a href="{{ route('posts.show', $post) }}" 
                      class="btn btn-xs btn-default"
                      target="_blank">
                      <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.posts.edit', $post) }}" 
                       class="btn btn-xs btn-info"><i class="fa fa-pencil"></i>
                    </a>

                    <form action="{{ route('admin.posts.destroy', $post) }}" method="post" style="display: inline;">
                      {{ csrf_field() }} {{ method_field('DELETE') }}
                      <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta publicación?')">
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
        $('#posts-table').DataTable({
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