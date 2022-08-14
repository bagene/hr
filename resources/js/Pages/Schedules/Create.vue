<template>
  <HContainer>
    <h1>Create Schedule</h1>
  </HContainer>

  <HContainer>
    <h1>Choose Your Template</h1>

    <div class="flex">
      <HPanel 
        v-for="template in templates" 
        :key="template.id" 
        :active="selectedType === template.type" 
        @click="selectTemplate(template.type, true, template)"
        >
        <h1 v-text="template.type"></h1>
      </HPanel>
      <HPanel 
        :active="selectedType === 'none'" 
        @click="selectTemplate('none', false)"
        >
        <h1>None</h1>
      </HPanel>
    </div>
  </HContainer>

  <form @submit.prevent="">
    <HContainer>
      <FormSelect
        class="mb-6"
        name="Type"
        v-model="form.type"
        :error="form.errors.type"
        @clearError="clearErrors('organization_id')"
        >
        <option value="fixed">Fixed</option>
        <option value="flexible">Flexible</option>
      </FormSelect>

      <FormInput
        class="mb-6"
        id="break-input"
        v-model="form.break"
        :error="form.errors.break"
        @clearError="clearErrors('name')"
        >
        Break (mins)
      </FormInput>
    </HContainer>
    <HContainer v-for="detail in form.schedule_details" :key="`detail-${detail.day}`">
      <h1 class="mb-2" v-text="days[detail.day-1]"></h1>
      <FormInput
        class="mb-6"
        id="detail-start"
        type="time"
        v-model="detail.start"
        :error="detail.errors.start"
        @clearError="clearErrors('start')"
        >
        Start
      </FormInput>
      <FormInput
        class="mb-6"
        id="detail-end"
        type="time"
        v-model="detail.end"
        :error="detail.errors.end"
        @clearError="clearErrors('end')"
        >
        End
      </FormInput>
      <FormInput
        class="mb-6"
        id="detail-end"
        type="number"
        v-model="detail.end"
        :error="detail.errors.end"
        @clearError="clearErrors('end')"
        >
        Break
      </FormInput>
    </HContainer>
    <HContainer v-if="form.schedule_details.length < 7">
      <button @click="addDay">Add Day</button>
    </HContainer>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import HContainer from '../../Components/HContainer.vue'
import HPanel from '../../Components/HPanel.vue'
import FormInput from '../../Components/FormInput.vue'
import FormSelect from '../../Components/FormSelect.vue'

export default {
  props: {
    templates: Array,
  },
  components: { HContainer, HPanel, FormInput, FormSelect, },
  watch: {
    selectedTemplate() {
      if(this.hasTemplate && this.selectedTemplate !== null) {
        this.form = useForm({
          type: this.selectedTemplate?.type,
          break: this.selectedTemplate?.break,
          schedule_details: this.selectedTemplate?.schedule_details.map(item => useForm(item)),
        });
      } else {
        this.form = useForm({
          type: '',
          break: 0,
          schedule_details: [useForm({
            day: 1,
            start: '',
            end: '',
            break: 0,
            is_off: false,
          })],
        });
      }
    },
  },
  data() {
    return {
      selectedType: "fixed",
      selectedTemplate: this.templates?.[0],
      hasTemplate: false,
      form: useForm({
        type: '',
        break: 0,
        schedule_details: [useForm({
          day: 1,
          start: '',
          end: '',
          break: 0,
          is_off: false,
        })],
      }),
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
  },
  methods: {
    selectTemplate(type, hasTemplate = false, selectedTemplate = null) {
      this.hasTemplate = hasTemplate;
      this.selectedType = type;
      this.selectedTemplate = selectedTemplate;
    },
    addDay() {
      this.form.schedule_details.push(useForm({
        day: this.form.schedule_details.length+1,
        start: '',
        end: '',
        break: 0,
        is_off: false,
      }))
    },
    clearErrors(field) {
			this.form.clearErrors(field);
		},
  }
}
</script>