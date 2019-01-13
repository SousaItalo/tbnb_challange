<template>
  <div>
    <page-header title="My Houses">
      <a :href="`/new-house`">New House</a>
    </page-header>
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
                <a :href="`/my-houses/${house.id}`" class="card-footer-item">Details</a>
                <a :href="`/my-houses/${house.id}/edit`" class="card-footer-item">Edit</a>
                <a :href="`/my-houses/${house.id}/manage-cleaners`" class="card-footer-item">Cleaners</a>
              </footer>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
  import PageHeader from '../layout/PageHeader.vue';

  export default {
    name: "HouseList",
    components: {
      PageHeader
    },
    data () {
      return {
        houses: []
      }
    },
    created () {
      axios.get('/get-my-houses').then(response => {
        this.houses = response.data;
      });
    }
  }
</script>

<style scoped>
  .house-list {
    padding: 8px;
  }
  .house-list li {
    margin-bottom: 8px;
  }
</style>
