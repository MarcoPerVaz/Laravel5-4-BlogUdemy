<template>
  <!-- Componente Paginator.vue -->
    <paginator :url="`/api/tags/${this.tag}`" component-name="posts-list"/>
  <!-- FinComponente Paginator.vue -->
</template>

<script>
  export default {
    props: [
      'tag'
    ]
  } 
</script>