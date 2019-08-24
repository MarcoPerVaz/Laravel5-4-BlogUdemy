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
          
            <!-- Componente SocialLinks.vue -->
              <social-links :description="post.title"></social-links>
            <!-- Fin Componente SocialLinks.vue -->
            
            <div class="tags container-flex">
              <span class="tag c-gris text-capitalize" v-for="(tag, index) in post.tags" :key="index">

                <!-- Componente TagLink -->
                  <tag-link :tag="tag"></tag-link>
                <!-- Fin Componente TagLink -->
                
              </span>	
          </div>
        </footer>
        <div class="comments">
          <div class="divider"></div>
          <!-- Componente DisqusComments.vue -->
            <disqus-comments></disqus-comments>
          <!-- Fin Componente DisqusComments.vue -->
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
  