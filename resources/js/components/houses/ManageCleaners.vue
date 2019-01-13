<template>
  <div>
    <page-header title="Manage Cleaners">
      <div class="manage-cleaners__subtitle has-text-white is-italic has-text-right">{{ house.name }}</div>
      <div class="manage-cleaners__subtitle has-text-white is-italic has-text-right">{{ house.address }}</div>
      <div class="manage-cleaners__input-container">
        <a v-if="!showCleanerInput" @click.prevent="showInput">Assign Cleaner</a>
        <input v-if="showCleanerInput" v-model="email" @keyup.enter="assignCleaner" class="input" type="text" placeholder="cleaner@example.com">
      </div>
    </page-header>

    <div class="columns is-mobile">
      <div class="column">
        <ul class="cleaners-list">
          <li :key="cleaner.id" v-for="cleaner in cleaners">
            <div class="card">
              <div class="card-content">
                <div class="content">
                  <p class="title is-size-5">{{ cleaner.name }}</p>
                  <p class="subtitle is-size-6 has-text-grey">{{ cleaner.email }}</p>
                </div>
              </div>
              <footer class="card-footer">
                <a class="card-footer-item" @click='dismissCleaner(cleaner)'>Dismiss</a>
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
    components: {
      PageHeader
    },
    props: ['house'],
    data() {
      return {
        cleaners: {},
        email: '',
        showCleanerInput: false,
      }
    },
    methods: {
      assignCleaner() {
        axios.post(`/my-houses/${this.house.id}/assign-cleaner`, { 'email': this.email}).then(response => {
          this.cleaners = response.data;
          this.showCleanerInput = false;
        });
      },
      showInput() {
        this.showCleanerInput = true;
      },
      dismissCleaner(cleaner) {
        axios.get(`/my-houses/${this.house.id}/dismiss-cleaner/${cleaner.id}`).then(response => {
          this.cleaners = response.data;
        });
      },
    },
    created() {
      axios.get(`/my-houses/${this.house.id}/cleaners`).then(response => {
        this.cleaners = response.data;
      });
    }
  }
</script>

<style scoped>
  .manage-cleaners__subtitle {
    line-height: 1.1;
  }

  .manage-cleaners__input-container {
    padding-top: 10px;
  }

  li {
    margin-bottom: 10px;
  }
</style>
