<template>
  <div>
    <header class="container-flex space-between">
      <div class="date">
          <span class="c-gris">
              {{ post.published_date }} / {{ post.owner.name }}
          </span>
          <!-- <span class="c-gris">- {{ optional($post->published_at)->diffForHumans() }}</span> -->
      </div>
      <!-- @if ($post->category) -->
        <div class="post-category">
          <span class="category">
            <!-- <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a> -->
            <a href="#">{{ post.category.name }}</a>
          </span>
        </div>
      <!-- @endif -->
    </header>

    <h1 v-html="post.title"></h1>

    <br>

    <div class="divider"></div>
  </div>
</template>

<script>
export default {
  props: [
    'post'
  ]
}
</script>