<template>
  <h1>{{ title }} Organization</h1>

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

		<FormInput 
			class="mb-6"
      id="address-line-1-input"
      placeholder="Enter Address Line 1.."
      v-model="form.address_line_1"
      :error="form.errors.address_line_1"
			@clearError="clearErrors('address_line_1')"
			>
			Address 1
		</FormInput>
		
		<FormInput 
			class="mb-6"
      id="address-line-2-input"
      placeholder="Enter Address Line 2.."
      v-model="form.address_line_2"
      :error="form.errors.address_line_2"
			@clearError="clearErrors('address_line_2')"
			>
			Address 2
		</FormInput>

		<FormInput 
			class="mb-6"
      id="address-city-input"
      placeholder="Enter City.."
      v-model="form.address_city"
      :error="form.errors.address_city"
			@clearError="clearErrors('address_city')"
			>
			City
		</FormInput>

		<FormInput 
			class="mb-6"
      id="address-region-input"
      placeholder="Enter Region.."
      v-model="form.address_region"
      :error="form.errors.address_region"
			@clearError="clearErrors('address_region')"
			>
			City
		</FormInput>

		<FormInput 
			class="mb-6"
      id="address-country-input"
      placeholder="Enter Country.."
      v-model="form.address_country"
      :error="form.errors.address_country"
			@clearError="clearErrors('address_country')"
			>
			City
		</FormInput>

		<FormInput 
			class="mb-6"
      id="org-size-input"
      placeholder="Enter Size.."
      v-model="form.organization_size"
      :error="form.errors.organization_size"
			@clearError="clearErrors('organization_size')"
			>
			City
		</FormInput>

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
export default {
  components: { FormInput },
  props: {
    org: {
        type: Object,
        required: false,
    }
  },
  data() {
    return {
      title: this.org ? 'Edit' : 'Create',
      form: useForm({
        name: '',
        address_line_1: '',
        address_line_2: '',
        address_city: '',
        address_region: '',
        address_country: '',
        organization_size: '',
      }),
    }
  },
  mounted() {
    if(this.org) {
      this.form = useForm(this.org);
    }
  },
	methods: {
		submit() {
			const { org, form, route } = this;

			if(org) {
				form.put(route(`organization.update`, this.org.id));
				return;
			}

			form.post(route(`organization.store`));
		},
		clearErrors(field) {
			this.form.clearErrors(field);
		},
	}
}
</script>