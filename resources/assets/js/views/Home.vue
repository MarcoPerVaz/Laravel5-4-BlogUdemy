<template>
  <section class="posts container">
    <!-- @if (isset($title))
        <h3>{{ $title }}</h3>
    @endif -->
        <article class="post" v-for="(post, index) in posts" :key="index">

          <!-- Función para las Vistas polfórmicas - Está en el modelo Post -->
          <!-- @include( $post->viewType('home') ) -->

          <div class="content-post">
            
            <!-- @include('posts.header') -->
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

            <br>

           <!-- <p>{{ $post->excerpt }}</p> -->
           <p v-text="post.excerpt"></p>
            <footer class="container-flex space-between">
              <div class="read-more">
                <a href="#" class="text-uppercase c-green">Leer más</a>
              </div>
              
              <!-- @include('posts.tags') -->
              <div class="tags container-flex">
                  <span class="tag c-gris text-capitalize" v-for="(tag, index) in post.tags" :key="index">
                    <a href="#">{{ tag.name }}</a>
                  </span>	
              </div>

            </footer>
          </div>
        </article>
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
  data() {
    return {
      posts: []
    }
  },
  mounted (){
    axios.get('/api/posts')
         .then(res => {
           this.posts = res.data.data;
           
         })
         .catch(err => {
           console.log(err);
           
         });
    
  }
}
</script>