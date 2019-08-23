<template>
  <section class="posts container">
    <!-- @if (isset($title))
        <h3>{{ $title }}</h3>
    @endif -->
        <article class="post" v-for="(post, index) in posts" :key="index">

          <!-- Función para las Vistas polfórmicas - Está en el modelo Post -->
          <!-- @include( $post->viewType('home') ) -->

          <div class="content-post">
            
            <!-- Componente PostHeader.vue | Encabezador del post -->
              <post-header :post="post"></post-header>
            <!-- Fin Componente PostHeader.vue | Encabezador del post -->
            

            <br>

           <!-- <p>{{ $post->excerpt }}</p> -->
           <p v-text="post.excerpt"></p>
            <footer class="container-flex space-between">
              <div class="read-more">
                <!-- Opción 1 -->
                  <router-link :to="`/blog/${post.url}`" class="text-uppercase c-green">Leer más 1</router-link>
                <!--  -->
                <br>
                <!-- Opción 2 (Se debe crear la ruta)-->
                  <router-link :to="{name: 'posts_show', params: {url: post.url}}" class="text-uppercase c-green">Leer más 2</router-link>
                  <!--  -->
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
</template>

<script>
  export default {
    data() {
      return {
        posts: []
      }
    },
    mounted (){
      axios.get(`/api/categories/${this.$route.params.category}`)
          .then(res => {
            this.posts = res.data.data;
            
          })
          .catch(err => {
            console.log(err);
            
          });
      
    }
  } 
</script>