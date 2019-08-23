<template>
  <div>
    <!-- Post show {{ $route.params.url }} -->
     <section class="post container">

      <!-- Función para las Vistas polfórmicas - Está en el modelo Post -->
      <!-- @include( $post->viewType() )  -->

      <div class="content-post">

        <!-- Componente PostHeader.vue | Encabezador del post-->
          <post-header :post="post"></post-header>
        <!-- Fin Componente PostHeader.vue | Encabezador del post -->

        <div class="image-w-text" v-html="post.body"></div>
        <footer class="container-flex space-between">
            <!-- @include('partials.social-links', ['description' => $post->title]) -->
            
            <!-- @include('posts.tags') -->
        </footer>
        <div class="comments">
          <div class="divider"></div>
          <div id="disqus_thread"></div>
            <!-- @include('partials.disqus-script')                        -->
        </div><!-- .comments -->
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: [
    'url'
  ],
  data(){
    return {
      post: {
        owner: {},
        category: {},
      }
    }
  },
  mounted(){
    // Forma 1
      // axios.get('/api/blog/' + this.$route.params.url)
              // .then(res => {
              //   console.log(res.data);
              // })
              // .catch(err => {
              //   console.log(err.response.data);
              // })
    // 
    // Forma 2
      axios.get(`/api/blog/${this.url}`)
           .then(res => {
            //  console.log(res.data);
             this.post = res.data
           })
           .catch(err => {
             console.log(err.response.data);
           })
    // 
  }
}
</script>
  