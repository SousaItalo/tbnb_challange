<template>
  <div class="form">
    <form method="POST" action="/store-house">
        <div class="form-input">
          <label class="has-text-white" for="name">House Name:</label>
          <input type="text" name="name" v-model="houseName">
        </div>
        <div class="form-input">
          <label class="has-text-white" for="address">Address:</label>
          <input type="text" name="address" v-model="houseAddress">
        </div>
        <input type="hidden" name="id" :value="id">
        <input type="hidden" name="_token" :value="csrf">
        <input v-if="method == 'PATCH'" type="hidden" name="_method" :value="method">
        <button>Submit</button>
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
