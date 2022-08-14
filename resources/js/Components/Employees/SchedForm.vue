<template>
  <form>
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
  </form>
</template>

<script>
import FormInput from '../FormInput.vue'
import FormSelect from '../FormSelect.vue'
export default {
  props: {
    form: Object,
  },
  components: { FormInput, FormSelect, },
}

</script>

<style>

</style>