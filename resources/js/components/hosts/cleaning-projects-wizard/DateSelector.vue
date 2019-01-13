<template>
  <div class="date-picker">

      <date-picker
        v-model="start"
        @input="sendStart"
        placeholder="Start date and time"
        lang="en"
        type="datetime"
        format="YYYY-MM-DD hh:mm:ss"
        value-type="timestamp"
        :time-picker-options="options"/>
        <date-picker
        v-model="end"
        @input="sendEnd"
        placeholder="End date and time"
        lang="en"
        type="datetime"
        format="YYYY-MM-DD hh:mm:ss"
        value-type="timestamp"
        :time-picker-options="options"/>
  </div>
</template>

<script>
  import DatePicker from 'vue2-datepicker'

  export default {
    components: { DatePicker },
    data() {
      return {
        start: '',
        end: '',
        options: { start: '00:00', step: '00:30', end: '23:30' },
      }
    },
    methods: {
      sendStart() {
        this.$emit('startSelected', this.start);
      },
      sendEnd() {
        this.$emit('endSelected', this.end);
      },
    },
  }
</script>

<style scoped>
  .date-picker {
    text-align: center;
    margin-bottom: 20px;
  }
</style>
