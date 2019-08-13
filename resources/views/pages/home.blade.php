@extends('layout')

	<section class="posts container">
		@section('content')
		@if (isset($title))
				<h3>{{ $title }}</h3>
		@endif
		@foreach ($posts as $post)
				<article class="post">

					{{-- Función para las Vistas polfórmicas - Está en el modelo Post --}}
					@include( $post->viewType('home') )

					<div class="content-post">
						
						@include('posts.header')

						<h1>{{ $post->title }}</h1>
						<div class="divider"></div>
						<p>{{ $post->excerpt }}</p>
						<footer class="container-flex space-between">
							<div class="read-more">
								<a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">Leer más</a>
							</div>
							
							@include('posts.tags')

						</footer>
					</div>
				</article>
		@endforeach
	</section><!-- fin del div.posts.container -->

	{{ $posts->links() }}
@endsection

	