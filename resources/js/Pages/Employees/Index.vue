<template>
  <div class="flex justify-between">
		<h1>Employees</h1>
	</div>

  <table class="table-fixed border-collapse border border-slate-500">
		<thead>
			<tr>
				<th class="border border-slate-600 p-2">Name</th>
        <th class="border border-slate-600 p-2">Department</th>
				<th class="border border-slate-600 p-2">Position</th>
				<th class="border border-slate-600 p-2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="employee in employees" :key="employee.id">
				<td class="border border-slate-700 p-2" v-text="employee.name"></td>
        <td class="border border-slate-700 p-2" v-text="employee.department.name"></td>
				<td class="border border-slate-700 p-2" v-text="employee.role.name"></td>
        <td class="align-center"><Link :href="route('employee.show', employee)">View</Link></td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
  props: {
    employees: Array,
  }
}
</script>