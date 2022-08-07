<template>
	<aside class="w-64" aria-label="Sidebar">
		<div class="overflow-y-auto py-4 px-3 bg-gray-50 dark:bg-gray-800 h-screen">
				<div class="p-2 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
					<h1><Link href="/">My App</Link></h1>
				</div>
				<ul class="space-y-2">
					<li>
						<SBItem :href="route('home')">Dashboard</SBItem>
						<SBItem :href="route('department.index')">Departments</SBItem>
						<template v-if="hasPermission('organization.index')">
							<SBItem :href="route('organization.index')">Settings</SBItem>
							<SBItem :href="route('organization.index')">Organizations</SBItem>
						</template>
						<SBItem v-if="hasPermission('employee.index')" :href="route('employee.index')">Employees</SBItem>
					</li>
				</ul>
		</div>
	</aside>
</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3'
import SBItem from './SBItem.vue'
export default {
  components: { SBItem },
	computed: {
		user() {
			return usePage().props.value.user;
		},
	},
	methods: {
		hasPermission(permission) {
			const { role: { permissions } } = this.user;
			return permissions.some((p) => p.name === permission);
		},
	},
}
</script>