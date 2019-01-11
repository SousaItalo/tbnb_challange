<template>
  <div>
    <h1>New House</h1>
    <house-form
      :csrf="csrf"
      method="POST"
    />
  </div>
</template>

<script>
  import HouseForm from './HouseForm.vue';

  export default {
    props: ['csrf'],
    components: {
      HouseForm
    }

  }
</script>

<style scoped>

</style>
