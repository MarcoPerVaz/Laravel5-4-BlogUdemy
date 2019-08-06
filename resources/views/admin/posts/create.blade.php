@extends('admin.layout')

@section('header')
    <h1>
     Posts
      <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
      <li class="active">Crear</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <form action="">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Título de la publicación</label>
                        <input type="text" class="form-control" name="title" placeholder="Ingresa aquí el título de la publicación">
                    </div>
                    <div class="form-group">
                        <label for="">Contenido de la publicación</label>
                        <textarea name="excerpt" rows="10" placeholder="Ingresa el contenido completo de la publicaicón" class="form-control"></textarea>
                    </div>
                </div>
                </div>
            </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Extracto de la publicación</label>
                        <textarea name="excerpt" placeholder="Ingresa un extracto de la publicaicón" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection