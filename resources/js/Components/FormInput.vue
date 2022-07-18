<template>
	<div>
		<label class="block text-gray-700 text-sm font-bold mb-2" :for="id">
			<slot />
		</label>
		<input
			:type="type"
			class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
      :id="id"
      :placeholder="placeholder"
			v-model="modelValue"
			@input="updateInput($event.target.value)"
			/>
		<span class="text-red-700 font-medium">{{ error }}</span>
	</div>
</template>
<script>
export default {
	props: {
		id: String,
		type: {
			type: String,
			default: 'text',
		},
		placeholder: String,
		modelValue: String || Number,
		error: String,
	},
	emits: ['update:modelValue', 'clearError'],
	methods: {
		updateInput(value) {
			this.$emit('clearError');
			this.$emit('update:modelValue', value);
		}
	}
}
</script>