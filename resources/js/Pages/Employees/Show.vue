<template>
  <HContainer>
    <h1 v-text="employee.name"></h1>
    <span v-text="employee.department?.name"></span>
  </HContainer>

  <HContainer>
    <TabContainer
      :items="tabs"
      keyIndex="key"
      :active="activeTab"
      @setActive="selectTab"
      >

      <EProfile 
        v-if="activeTab === 'prof-key'"
        :profile="employee.profile"
        />

      <ETimeAttendance
        v-if="activeTab === 'time-att-key'"
        :schedule="employee.schedule"
        />
    </TabContainer>
  </HContainer>
</template>

<script>
import EProfile from '../../Components/Employees/EProfile.vue';
import ETimeAttendance from '../../Components/Employees/ETimeAttendance.vue';
import HContainer from '../../Components/HContainer.vue'
import TabContainer from '../../Components/TabContainer.vue'
export default {
  components: { HContainer, TabContainer, EProfile, ETimeAttendance },
  props: {
    employee: Object,
    user: Object,
  },
  data() {
    return {
      activeTab: 'prof-key',
      tabs: [
        { title: 'Profile', key: 'prof-key' },
        { title: 'Payroll', key: 'payroll-key' },
        { title: 'Time Attendance', key: 'time-att-key' },
      ],
    };
  },
  methods: {
    selectTab(item) {
      this.activeTab = item.key;
    }
  }
}
</script>

<style>

</style>