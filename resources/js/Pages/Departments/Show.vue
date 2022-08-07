<template>
  <div class="flex justify-between">
		<h1 v-text="department.name"></h1>
    <Link :href="route('department.edit', department)">Edit</Link>
	</div>

  <div>
		<Link :href="route('department.employee.add', department)">Add Employee</Link>
	</div>

  <table class="table-fixed border-collapse border border-slate-500">
		<thead>
			<tr>
				<th class="border border-slate-600 p-2">Name</th>
				<th class="border border-slate-600 p-2">Position</th>
				<th class="border border-slate-600 p-2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="employee in department.employees" :key="employee.id">
				<td class="border border-slate-700 p-2" v-text="employee.name"></td>
				<td class="border border-slate-700 p-2" v-text="employee.role.name"></td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
  props: {
    department: Object,
    user: Object,
  }
}
</script>