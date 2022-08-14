<template>
  <div class="h-panel border rounded-lg flex justify-center items-center text-center mr-4"
    :class="{
      'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300': !active,
      'text-white bg-blue-600 active border-blue-600': active,
    }"
    >
    <slot />
  </div>
</template>

<script>
export default {
  props: {
    active: {
      type: Boolean,
      default: false,
    },
  }
}
</script>

<style scoped>
  .h-panel {
    height: 200px;
    width: 200px
  }
</style>