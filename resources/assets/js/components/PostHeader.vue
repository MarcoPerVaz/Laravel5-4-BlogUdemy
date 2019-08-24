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
            <!-- Componente CategoryLink.vue -->
              <category-link :category="post.category"></category-link>
            <!-- Fin Componente CategoryLink.vue -->
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