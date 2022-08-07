<template>
  <h1>{{ title }} Department</h1>

  <form @submit.prevent="submit">
		<FormInput 
			class="mb-6"
			id="name-input"
			placeholder="Name"
			v-model="form.name"
			:error="form.errors.name"
			@clearError="clearErrors('name')"
			>
			Company Name
		</FormInput>

		<FormSelect
			v-if="user.role.name === 'superadmin'"
			id="organization-select"
			class="mb-6"
			name="Organization"
			v-model="form.organization_id"
			:error="form.errors.organization_id"
			@clearError="clearErrors('organization_id')"
			>
			<option 
				v-for="org in organizations" 
				:key="org.id" 
				v-text="org.name"
				:value="org.id"
				/>
		</FormSelect>

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
import { useForm } from '@inertiajs/inertia-vue3'
import FormInput from '../../Components/FormInput.vue';
import FormSelect from '../../Components/FormSelect.vue';
export default {
  components: { FormInput, FormSelect },
  props: {
		user: Object,
    department: {
			type: Object,
			required: false,
    },
		organizations: {
			type: Array,
			required: false,
		},
  },
  data() {
    return {
      title: this.department ? 'Edit' : 'Create',
      form: useForm({
        name: '',
				organization_id: this.user.organization_id,
      }),
    }
  },
  mounted() {
    if(this.department) {
      this.form = useForm(this.department);
    }
  },
	methods: {
		submit() {
			const { department, form, route } = this;

			if(department) {
				form.put(route(`department.update`, department.id));
				return;
			}

			form.post(route(`department.store`));
		},
		clearErrors(field) {
			this.form.clearErrors(field);
		},
	}
}
</script>