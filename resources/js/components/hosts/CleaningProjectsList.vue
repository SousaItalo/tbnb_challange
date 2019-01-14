<template>
  <div>
    <page-header title="Cleaning Projects">
       <a :href="`/new-cleaning-project`">New Cleaning Project</a>
    </page-header>

    <div class="columns is-mobile">
      <div class="column">
        <ul class="house-list">
          <li :key="cleaning.id" v-for="cleaning in cleanings">
            <div class="card">
              <div class="card-content">
                <div class="content">
                  <p class="title is-size-5">{{ cleaning.houseName }}</p>
                  <p class="subtitle is-size-6 has-text-grey">{{ cleaning.houseAddress }}</p>
                  <span class="subtitle is-size-7 has-text-grey"><strong>Cleaner:</strong> &nbsp; {{ cleaning.cleanerName }}</span>
                </div>
              </div>
              <footer class="card-footer">
                <a :href="`/host-cleaning-projects/${cleaning.id}`" class="card-footer-item">Details</a>
                <a :href="`#`" class="card-footer-item">Edit</a>
                <a :href="`/host-cleaning-projects/${cleaning.id}/delete`" class="card-footer-item">Delete</a>
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
    props: ['cleanings'],
    components: {
      PageHeader,
    },
  }
</script>

<style scoped>
  li {
    margin-bottom: 10px;
  }
</style>
