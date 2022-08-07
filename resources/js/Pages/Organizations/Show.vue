<template>
	<div class="flex justify-between">
		<h1 v-text="org.name"></h1>
		<Link :href="route('organization.edit', org)">Edit</Link>
	</div>

	<div>
		<Link :href="route('organization.account.create', org)">Add New Account</Link>
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
			<tr v-for="user in org.users" :key="user.id">
				<td class="border border-slate-700 p-2" v-text="user.name"></td>
				<td class="border border-slate-700 p-2" v-text="user.role.name"></td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: {
		org: Object,
	}
}
</script>