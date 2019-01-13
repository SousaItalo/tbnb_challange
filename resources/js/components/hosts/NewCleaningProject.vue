<template>
  <div>
    <page-header title="New Cleaning Project">
      <div class="has-text-white is-italic has-text-centered">{{ steps[stepCount].title }}</div>
    </page-header>
    <component
      :is="steps[stepCount].component"
      @houseSelected="houseId = $event"
      @cleanerSelected="cleanerId = $event"
      @startSelected="start = $event"
      @endSelected="end = $event"
      @forward="stepCount++"
      :houseId="houseId"/>

      <div class="buttons-container">
        <button v-if="stepCount > 0" @click="stepCount--" class="button">Back</button>
        <button v-if="stepCount < 2 && houseId && cleanerId" @click="stepCount++" class="button">next</button>
        <button v-if="stepCount == 2 && houseId && cleanerId" @click="createCleaningProject" class="button">Create Cleaning</button>
      </div>
  </div>
</template>

<script>
  import PageHeader from '../layout/PageHeader.vue';
  import HouseSelector from './cleaning-projects-wizard/HouseSelector.vue';
  import CleanerSelector from './cleaning-projects-wizard/CleanerSelector.vue';
  import DateSelector from './cleaning-projects-wizard/DateSelector.vue';

  export default {
    components: {
      PageHeader,
      HouseSelector,
      CleanerSelector,
      DateSelector,
    },
    data(){
      return {
        steps: {
          0: {
            title: 'Select the house',
            component: 'house-selector'
          },
          1: {
            title: 'Select the cleaner',
            component: 'cleaner-selector'
          },
          2: {
            title: 'Select the date',
            component: 'date-selector'
          },
        },
        houseId: null,
        cleanerId: null,
        start: null,
        end: null,
        stepCount: 0,
        currentWizardStep: 'house-selector',
      }
    },
    methods: {
      createCleaningProject() {
        if ( this.end > this.start) {
          axios.post('/store-cleaning-project', {
            'house': this.houseId,
            'cleaner': this.cleanerId,
            'start': this.start,
            'end': this.end,
          })
        } else {
          alert('Select an ending time after the starting time');
        }
      }
    }
  }
</script>

<style scoped>
  .buttons-container {
    text-align: center;
  }
  button {
    width: 40%;
  }
</style>
