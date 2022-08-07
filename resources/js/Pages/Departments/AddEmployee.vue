<template>
  <div class="flex justify-between">
		<h1 v-text="department.name"></h1>
  </div>

  <form @submit.prevent="submit">
    <FormSelect
      id="employee-select"
      class="mb-6"
      name="Employee"
      v-model="form.user_id"
      :error="form.errors.user_id"
      @clearError="clearErrors('user_id')"
      >
      <option
        v-for="user in users"
        :key="user.id"
        :value="user.id"
        v-text="user.name"
        />
    </FormSelect>

    <FormCheckbox 
			id="admin-input"
      type="checkbox"
			v-model="form.isAdmin"
			:error="form.errors.isAdmin"
			@clearError="clearErrors('isAdmin')"
			>
			Is Admin
		</FormCheckbox>

    <div class="flex justify-between">
      <button
        type="submit"
        class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import FormSelect from '../../Components/FormSelect.vue';
import FormCheckbox from '../../Components/FormCheckbox.vue';
export default {
  components: { FormSelect, FormCheckbox },
  props: {
    department: Object,
    users: Array,
  },
  data() {
    return {
      form: useForm({
        user_id: null,
        isAdmin: false,
      }),
    }
  },
  methods: {
    async submit() {
      console.log('Submitted');
      const { form, department } = this;

      await form.put(this.route('department.employee.store', department));
    },
    clearErrors(field) {
			this.form.clearErrors(field);
		},
  }
}
</script>