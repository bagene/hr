<template>
  <li class="mr-2">
    <a href="#" 
      class="inline-block p-4 rounded-t-lg border-b-2 border-transparent "
      :class="{
        'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300': !active,
        'text-blue-600 active border-blue-600 dark:text-blue-500 dark:border-blue-500': active,
      }"
      v-text="item.title"
      ></a>
  </li>
</template>

<script>
export default {
  props: {
    item: Object,
    active: Boolean,
  }
}
</script>