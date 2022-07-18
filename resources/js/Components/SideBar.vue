<template>
	<aside class="w-64" aria-label="Sidebar">
		<div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
				<ul class="space-y-2">
					<li>
						<SBItem :href="route('organization.index')">Organizations</SBItem>
					</li>
				</ul>
		</div>
	</aside>
</template>

<script>
import SBItem from './SBItem.vue'
export default {
  components: { SBItem },

}
</script>