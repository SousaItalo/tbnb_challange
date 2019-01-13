<template>
  <div>
    <page-header title="My Cleaners">
      <a :href="`/cleaner-connection`">New Cleaner Connection</a>
    </page-header>

    <div class="columns is-mobile">
      <div class="column">
        <ul class="cleaner-list">
          <li :key="cleaner.id" v-for="cleaner in cleaners">
            <div class="card">
              <div class="card-content">
                <div class="content">
                  <p class="title is-size-5">{{ cleaner.user.name }}</p>
                  <p class="subtitle is-size-5 has-text-weight-light has-grey-text">
                    Assigned to {{ cleaner.houses.length }} house(s).
                  </p>
                </div>
              </div>
                <footer class="card-footer">
                  <a :href="`/my-cleaners/${cleaner.id}`" class="card-footer-item">Details</a>
                  <a :href="`/delete-cleaner-connection/${cleaner.id}`" class="card-footer-item">Delete</a>
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

    name: "CleanerList",
    components: {
      PageHeader,
    },
    data () {
      return {
        cleaners: []
      };
    },
    created () {
      axios.get('/get-my-cleaners').then(response => {
        this.cleaners = response.data;
      });
    }
  }
</script>

<style scoped>
  .cleaner-list {
    padding: 8px;
  }
  .cleaner-list li {
    margin-bottom: 8px;
  }
</style>
