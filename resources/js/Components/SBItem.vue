<template>
	<Link class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
		<slot></slot>
	</Link>
</template>

<script>
export default {
	props: {
		name: String,
	}
}
</script>