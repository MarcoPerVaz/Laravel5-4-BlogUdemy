<template>
  <article class="post">

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
            <post-link class="text-uppercase c-green" :post="post">Leer más</post-link>
          <!--  -->
          <br>
          <!-- Opción 2 (Se debe crear la ruta)-->
            <router-link :to="{name: 'posts_show', params: {url: post.url}}" class="text-uppercase c-green">Leer más 2</router-link>
            <!--  -->
        </div>
        
        <div class="tags container-flex">
            <span class="tag c-gris text-capitalize" v-for="(tag, index) in post.tags" :key="index">
              <!-- Componente TagLink -->
                <tag-link :tag="tag"></tag-link>
              <!-- Fin Componente TagLink -->
            </span>	
        </div>

      </footer>
    </div>
  </article>
</template>

<script>
export default {
  props: [
    'post'
  ]
}
</script>