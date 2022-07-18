<template>
  <nav class="navbar bg-orange-400 flex px-4 py-2 justify-between">
    <h1><Link href="/">My App</Link></h1>

    <ul class="flex space-x-4">
			<li><Link :href="route('organization.index')">Organizations</Link></li>
      <li><Link :href="route('auth.logout')" as="button" method="post">Log Out</Link></li>
    </ul>
  </nav>
</template>