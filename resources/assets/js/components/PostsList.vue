<template>
  <section class="posts container">
    <!-- @if (isset($title))
        <h3>{{ $title }}</h3>
    @endif -->
        <!-- Componente PostsListItem.vue -->
          <posts-list-item 
              v-for="post in posts" 
              :key="post.id" 
              :post="post"
          />
        <!-- FinComponente PostsListItem.vue -->
    <!-- @empty -->
        <article class="post" v-if="! posts.length">

          <div class="content-post">
            
            <h1>No hay publicaciones todavía</h1>

          </div>
        </article>
  </section>
  <!-- {{ $posts->appends(request()->all())->links() }} -->
</template>

<script>
export default {
  props: [
    'posts'
  ]
}
</script>