<template>
  <!-- Componente Paginator.vue -->
      <paginator :url="`/api/categories/${this.category}`" component-name="posts-list"/>
    <!-- FinComponente Paginator.vue -->
</template>

<script>
  export default {
    props: [
      'category'
    ]
  } 
</script>