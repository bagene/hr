<template>
  <form @submit.prevent="submit">
    <!-- Email input -->
    <FormInput
      class="mb-6"
      id="email-input"
      placeholder="Email Address"
      v-model="form.email"
      :error="form.errors.email"
      />

    <!-- Password input -->
    <FormInput
      class="mb-6"
      id="password-input"
      type="password"
      placeholder="Password"
      v-model="form.password"
      :error="form.errors.password"
      />

    <div class="text-center lg:text-left">
      <button
        type="submit"
        class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
      >
        Login
      </button>
      <p class="text-sm font-semibold mt-2 pt-1 mb-0">
        Don't have an account?
        <a
          :href="route('auth.register')"
          class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
          >Register</a
        >
      </p>
    </div>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import FormInput from '../../Components/FormInput.vue';
import AuthLayout from '../../layouts/AuthLayout.vue';
export default {
  components: { FormInput },
  layout: AuthLayout,
  data() {
    return {
      form: useForm({
        email: '',
        password: '',
      })
    };
  },
  methods: {
    submit() {
      const { form, route } = this;

      form.post(route('auth.authenticate'));
    }
  }
}
</script>

<style>

</style>