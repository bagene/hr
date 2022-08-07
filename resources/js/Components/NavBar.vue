<template>
  <nav class="navbar bg-orange-400 flex px-4 py-2 w-full">
    <ul class="flex space-x-4 justify-end w-full">
			<li><Link :href="route('organization.index')">Organizations</Link></li>
      <li><Link :href="route('auth.logout')" as="button" method="post">Log Out</Link></li>
    </ul>
  </nav>
</template>