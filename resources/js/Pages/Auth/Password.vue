<template>
  <form @submit.prevent="submit">
		<!-- Password input -->
    <FormInput
      class="mb-6"
      id="password-input"
			type="password"
      placeholder="Password"
      v-model="form.password"
			:error="form.errors.password"
      />
		
		<!-- Password Confirmation input -->
    <FormInput
      class="mb-6"
      id="password-confirmation-input"
			type="password"
      placeholder="Confirm Password"
      v-model="form.password_confirmation"
      />

		<div class="text-center lg:text-left">
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
import AuthLayout from '../../layouts/AuthLayout.vue'
export default {
  components: { FormInput },
  layout: AuthLayout,
	props: {
		token: String,
		email: String,
	},
	data() {
		return {
			form: useForm({
				password: '',
				password_confirmation: '',
				email: this.email,
				token: this.token,
			}),
		}
	},
	methods: {
		submit() {
			const { form, route } = this;

			form.post(route('password.reset.post'));
		}
	}
}
</script>