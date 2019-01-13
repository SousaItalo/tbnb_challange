<template>
  <div>
    <page-header title="Edit House"/>
    <house-form
      :csrf="csrf"
      :id="id"
      :name="name"
      :address="address"
      method="PATCH"
    />
  </div>
</template>

<script>
  import PageHeader from '../layout/PageHeader.vue';
  import HouseForm from './HouseForm.vue';

  export default {
    props: ['csrf', 'id', 'name', 'address'],
    components: {
      PageHeader,
      HouseForm,
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
