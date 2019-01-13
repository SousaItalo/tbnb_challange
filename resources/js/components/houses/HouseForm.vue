<template>
  <div class="form">
    <form method="POST" action="/store-house">
        <div class="form-input">
          <label class="label has-text-white" for="name">House Name:</label>
          <input class="input" type="text" name="name" v-model="houseName">
        </div>
        <div class="form-input">
          <label class="label has-text-white" for="address">Address:</label>
          <input class="input" type="text" name="address" v-model="houseAddress">
        </div>
        <input type="hidden" name="id" :value="id">
        <input type="hidden" name="_token" :value="csrf">
        <input v-if="method == 'PATCH'" type="hidden" name="_method" :value="method">
        <div class="has-text-centered">
          <button class="button">Submit</button>
        </div>
      </form>
  </div>
</template>

<script>
  export default {
    props: ['csrf', 'id', 'name', 'address', 'method'],
    data() {
      return {
        houseId: '',
        houseName: '',
        houseAddress: '',
      };
    },
    created() {
      this.houseName = this.name;
      this.houseAddress = this.address;
      this.houseId = this.id;
    }
  }
</script>

<style scoped>
  .form-input{
    margin-top: 10px;
  }
  button {
    margin-top: 15px;
    min-width: 100px;
  }
</style>
