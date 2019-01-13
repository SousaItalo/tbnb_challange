<template>
  <div>
    <page-header title="New House"/>
    <house-form
      :csrf="csrf"
      method="POST"
    />
  </div>
</template>

<script>
  import PageHeader from '../layout/PageHeader.vue';
  import HouseForm from './HouseForm.vue';

  export default {
    props: ['csrf'],
    components: {
      PageHeader,
      HouseForm,
    }

  }
</script>

<style scoped>

</style>
