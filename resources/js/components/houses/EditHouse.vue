<template>
  <house-form :csrf="csrf" :id="id" :name="name" :address="address"></house-form>
</template>

<script>
  import HouseForm from './HouseForm.vue';

  export default {
    props: ['csrf', 'id', 'name', 'address'],
    components: {
      HouseForm
    },
    created() {
       axios.get('/get-my-houses').then(response => {
        this.houses = response.data;
      });
    }
  }
</script>

<style scoped>

</style>
