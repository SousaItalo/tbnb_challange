<template>
  <div class="form">
    <form method="POST" action="/store-house">
        <div class="form-input">
          <label class="has-text-white" for="name">House Name:</label>
          <input type="text" name="name" v-model="HouseName">
        </div>
        <div class="form-input">
          <label class="has-text-white" for="address">Address:</label>
          <input type="text" name="address" v-model="HouseAddress">
        </div>
        <input type="hidden" name="_token" :value="csrf">
        <button>Create House</button>
      </form>
  </div>
</template>

<script>
  export default {
    props: ['csrf', 'id', 'name', 'address'],
    data() {
      return {
        HouseName: '',
        HouseAddress: '',
      };
    },
    created() {
      this.HouseName = this.name;
      this.HouseAddress = this.address;
    }
  }
</script>

<style scoped>
 .form {
    display: flex;
    justify-content: center;
  }

  .form-input {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  input {
    margin-left: 10px;
    border-radius: 5px;
    padding: 5px;
  }

  button {
    display: block;
    margin: auto;
  }
</style>
