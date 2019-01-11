<template>
  <house-form :csrf="csrf"></house-form>
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
