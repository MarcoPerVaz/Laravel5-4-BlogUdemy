<template>
  <!-- Componente PostsList.vue -->
    <posts-list :posts="posts"></posts-list>
  <!-- Fin Componente PostsList.vue -->

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