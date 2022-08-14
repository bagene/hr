<template>
  <div class="w-100">
    <h1>Profile</h1>
  </div>

  <div v-if="!schedule" class="content">
    <h1 class="mb-2">No Schedule Found!</h1>

    <Link :href="route('schedule.create')">Create Schedule</Link>
  </div>

  <div v-else class="content">
    <h1 class="mb-2">Working Hours Setting: </h1>
    <table class="table-fixed border-collapse min-w-full">
      <tbody>
        <tr class="flex odd:bg-gray-200">
          <td class="basis-2/5 p-2">Schedule Type</td>
          <td class="basis-3/5 p-2" v-text="schedule?.type"></td>
        </tr>
      </tbody>
    </table>

    <table class="table-fixed border-collapse min-w-full">
      <thead>
        <tr class="flex odd:bg-gray-200">
          <td class="basis-2/5 p-2">Day</td>
          <td class="basis-1/5 p-2">Start</td>
          <td class="basis-1/5 p-2">End</td>
          <td class="basis-1/5 p-2">Break</td>
        </tr>
      </thead>
      <tbody>
        <template v-for="detail in schedule.schedule_details" :key="detail.id">
          <tr v-if="!detail.is_off" class="flex odd:bg-gray-200">
            <td class="basis-2/5 p-2" v-text="days[detail.day-1]"></td>
            <td class="basis-1/5 p-2" v-text="detail.start"></td>
            <td class="basis-1/5 p-2" v-text="detail.end"></td>
            <td class="basis-1/5 p-2">{{ detail.break }} min/s</td>
          </tr>
          <tr v-else class="flex odd:bg-gray-200">
            <td class="basis-2/5 p-2" v-text="days[detail.day-1]"></td>
            <td class="basis-3/5 p-2">Off</td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  props: {
    schedule: Object,
  },
  data() {
    return {
      days: [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
      ],
    }
  }
}
</script>