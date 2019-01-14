<template>
  <div>
    <page-header title="Cleaning Project Details">
      <a href="/my-cleanings" class="has-text-right">Back to Cleaning Projects</a>
    </page-header>
    <h1 class="title is-size-4 has-text-centered has-text-white has-text-weight-light">
      {{ house.name }}
    </h1>
    <div class="tile is-vertical">
      <p class="title has-text-weight-bold is-size-5">Cleaning Project No. #{{ cleaning.id }}</p>
      <p class="has-text-grey has-text-weight-bold is-size-6">Address</p>
      <p class="title is-size-4 has-text-weight-light">{{ house.address }}</p>

      <p class="has-text-grey has-text-weight-bold is-size-6">Stating at:</p>
      <p class="title is-size-4 has-text-weight-light">{{ cleaning.start }}</p>

      <p class="has-text-grey has-text-weight-bold is-size-6">Ending at:</p>
      <p class="title is-size-4 has-text-weight-light">{{ cleaning.end }}</p>
    </div>
  </div>
</template>

<script>
  import PageHeader from '../layout/PageHeader.vue';

  export default {
    components: {
      PageHeader,
    },
    props: ['cleaning', 'house']
  }
</script>

<style scoped>

</style>
