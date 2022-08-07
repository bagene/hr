<template>
  <ul class="flex flex-wrap -mb-px">
    <TabItem 
      v-for="item in items"
      :key="item[keyIndex]"
      :item="item"
      :active="item.key === active"
      @click="$emit('setActive', item)"
      />

    
  </ul>
  <div class="p-2 m-2 mt-4">
    <slot></slot>
  </div>
</template>

<script>
import TabItem from './TabItem.vue';
export default {
  components: { TabItem },
  props: {
    items: Array,
    keyIndex: String,
    active: String,
    index: {
      type: String,
      required: false,
    },
  },
  emits: ['setActive'],
  computed: {
    isActive(item) {
      return this.active.key === item.key;
    },
  },
}
</script>