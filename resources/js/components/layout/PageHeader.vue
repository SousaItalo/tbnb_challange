<template>
  <div class="page-header">
    <h1 class="title has-text-white has-text-weight-light has-text-centered">{{ title }}</h1>
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: ['title'],
}
</script>

<style scoped>
  .page-header {
    padding: 0px 8px;
    margin-bottom: 20px;
  }
</style>
