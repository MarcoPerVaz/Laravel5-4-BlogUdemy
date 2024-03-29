<header class="container-flex space-between">
  <div class="date">
      <span class="c-gris">{{ optional($post->published_at)->format('M d') }}</span>
      <span class="c-gris">- {{ optional($post->published_at)->diffForHumans() }}</span>
  </div>
  @if ($post->category)
    <div class="post-category">
      <span class="category">
        <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
      </span>
    </div>
  @endif
</header>