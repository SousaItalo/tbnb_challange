<template>
  <div>
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
                <a class="card-footer-item" @click='selectCleaner(cleaner.id)'>Select Cleaner</a>
              </footer>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['houseId'],
  data() {
    return {
      cleaners: {}
    }
  },
  methods: {
    selectCleaner(cleanerId) {
      this.$emit('cleanerSelected', cleanerId);
      this.$emit('forward');
    }
  },
  created() {
    axios.get(`/my-houses/${this.houseId}/cleaners`).then(response => {
      console.log(response.data);
      this.cleaners = response.data;
    });
  }
}
</script>

<style scoped>
  li {
    margin-bottom: 10px;
  }
</style>
