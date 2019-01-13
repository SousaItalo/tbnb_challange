<template>
  <div>
    <page-header title="New Cleaner Connection"/>
    <form method="POST" action="/cleaner-connection">
      <label class="label has-text-white" for="cleaner-email">Cleaner Email:</label>
      <input class="input" type="text" placeholder="cleaner@example.com" v-model="email" name="email">
      <input type="hidden" name="_token" :value="csrf">
      <div class="has-text-centered">
        <button class="button"> Create Connection</button>
      </div>
    </form>
  </div>
</template>

<script>
  import PageHeader from '../layout/PageHeader.vue';

export default {
  components: {
    PageHeader,
  },
  props: ['csrf'],
  data() {
    return {
      email: '',
    }
  }
}
</script>

<style scoped>
  input {
    margin-bottom: 20px;
  }

  .tile{
    min-height: 500px;
  }
</style>
