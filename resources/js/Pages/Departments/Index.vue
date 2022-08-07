<template>
  <div class="flex justify-between">
		<h1>Departments</h1>

		<Link :href="route('department.create')">Create Department</Link>
	</div>
	<table class="table-fixed border-collapse border border-slate-500">
		<thead>
			<tr>
				<th class="border border-slate-600 p-2">Name</th>
				<th class="border border-slate-600 p-2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="department in departments" :key="department.id">
				<td class="border border-slate-700 p-2" v-text="department.name"></td>
				<td class="border border-slate-700 p-2">
					<Link 
						:href="route('department.show', department.id)"
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
		departments: Array,
	}
}
</script>