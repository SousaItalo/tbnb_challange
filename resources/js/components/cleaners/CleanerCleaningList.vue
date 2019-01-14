<template>
  <div>
    <page-header title="My Cleanings"></page-header>
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
                <a :href="`/my-cleanings/${house.next_cleaning.id}`" class="card-footer-item">Details</a>
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
    name: "CleanerCleaningList",
    components: {
      PageHeader
    },
    props: ['houses']
  }
</script>

<style scoped>

</style>
