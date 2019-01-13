<template>
  <div class="columns is-mobile">
      <div class="column">
        <ul class="house-list">
          <li :key="house.id" v-for="house in houses">
            <div class="card">
              <div class="card-content">
                <div class="content">
                  <p class="title is-size-5">{{ house.name }}</p>
                  <p class="subtitle is-size-6 has-text-grey">{{ house.address }}</p>
                </div>
              </div>
              <footer class="card-footer">
                <a class="card-footer-item" @click.prevent="selectHouse(house.id)">Select House</a>
              </footer>
            </div>
          </li>
        </ul>
      </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      houses: [],
    }
  },
  methods: {
    selectHouse(id) {
      this.$emit('houseSelected', id);
      this.$emit('forward');
    },
  },
  created() {
    axios.get('/get-my-houses').then(response => {
      this.houses = response.data;
    });
  }
}
</script>

<style scoped>
  li {
    margin-bottom: 10px;
  }
</style>
