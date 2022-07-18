<template>
	<div class="flex justify-between">
  	<h1>Organizations</h1>

		<Link :href="route('organization.create')">Create Organization</Link>
	</div>
	<table class="table-fixed border-collapse border border-slate-500">
		<thead>
			<tr>
				<th class="border border-slate-600 p-2">Name</th>
				<th class="border border-slate-600 p-2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="org in orgs" :key="org.id">
				<td class="border border-slate-700 p-2" v-text="org.name"></td>
				<td class="border border-slate-700 p-2">
					<Link 
						:href="route('organization.show', org.id)"
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
						>View</Link>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: {
		orgs: Array,
	}
}
</script>