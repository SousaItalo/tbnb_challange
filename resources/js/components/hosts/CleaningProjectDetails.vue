<template>
  <div>
    <page-header title="Cleaning Project Details">
      <a href="/cleaning-projects" class="has-text-right">Back to Cleaning Projects</a>
    </page-header>
    <h1 class="title is-size-4 has-text-centered has-text-white has-text-weight-light">
      {{ houseName }}
    </h1>
    <div class="tile is-vertical">
      <p class="title has-text-weight-bold is-size-5">Cleaning Project No. #{{ id }}</p>
      <p class="has-text-grey has-text-weight-bold is-size-6">Address</p>
      <p class="title is-size-4 has-text-weight-light">{{ houseAddress }}</p>

      <p class="has-text-grey has-text-weight-bold is-size-6">Cleaner</p>
      <p class="title is-size-4 has-text-weight-light">{{ cleanerName }}</p>

      <p class="has-text-grey has-text-weight-bold is-size-6">Stating at:</p>
      <p class="title is-size-4 has-text-weight-light">{{ start }}</p>

      <p class="has-text-grey has-text-weight-bold is-size-6">Ending at:</p>
      <p class="title is-size-4 has-text-weight-light">{{ end }}</p>
    </div>
  </div>
</template>

<script>
  import PageHeader from '../layout/PageHeader.vue';

  export default {
    props: ['id', 'houseName', 'houseAddress', 'cleanerName', 'start', 'end'],
    components: {
      PageHeader
    },
  }
</script>

<style>

</style>
