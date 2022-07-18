<template>
  <h1>Create Account</h1>

  <form @submit.prevent="submit">
		<FormInput 
			class="mb-6"
      id="name-input"
      placeholder="Enter Name.."
      v-model="form.name"
      :error="form.errors.name"
			>
			Name
		</FormInput>

		<FormInput 
			class="mb-6"
      id="email-input"
      placeholder="Enter Email.."
      v-model="form.email"
      :error="form.errors.email"
			>
			Email
		</FormInput>

		<select
			v-model="form.role"
			class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
			id="role-select"
			>
			<option v-for="(role,idx) in roles" :key="`role-${idx}`" v-text="role"></option>
		</select>

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
import FormInput from '../../Components/FormInput.vue'
export default {
  components: { FormInput },
	props: {
		org: Object,
	},
	data() {
		return {
			roles: ['admin','employee'],
			form: useForm({
				name: '',
				email: '',
				role: '',
			}),
		}
	},
	methods: {
		submit() {
			const { route, form, org } = this;

			form.post(route('organization.account.store', org));
		}
	}
}
</script>