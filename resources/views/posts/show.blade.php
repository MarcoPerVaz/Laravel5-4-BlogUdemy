@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
  <article class="post container">

    {{-- Función para las Vistas polfórmicas - Está en el modelo Post --}}
    @include( $post->viewType() ) 

    <div class="content-post">

      @include('posts.header')

      <h1>{{ $post->title }}</h1>
      <div class="divider"></div>
      <div class="image-w-text">
        {!! $post->body !!}
      </div>
      <footer class="container-flex space-between">
          @include('partials.social-links', ['description' => $post->title])
          
          @include('posts.tags')
      </footer>
      <div class="comments">
        <div class="divider"></div>
        <div id="disqus_thread"></div>
          @include('partials.disqus-script')                       
      </div><!-- .comments -->
    </div>
  </article>
@endsection

@push('styles')
  {{-- Bootstrap CSS Customize 3.4 --}}
    {{-- No se puede customizar la versión 3.3.7 --}}
    <link rel="stylesheet" href="/css/twitter-bootstrap.css">
@endpush
@push('scripts')
  {{-- Disqus js --}}
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
  {{-- JQuery 3.2.1 --}}
    <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script>
  {{-- Bootstrap JS Customize 3.4 --}}
    {{-- No se puede customizar la versión 3.3.7 --}}
    <script src="/js/twitter-bootstrap.js"></script>
@endpush