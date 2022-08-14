<template>
  <div class="w-100">
    <h1>Profile</h1>
  </div>

  <div class="content">
    <table v-if="profile" class="table-fixed border-collapse min-w-full">
      <tbody>
        <tr v-for="key in Object.keys(profile)" :key="key" class="flex odd:bg-gray-200">
          <td class="basis-1/2 p-2" v-text="_snakeToPascal(key)"></td>
          <td class="basis-1/2 p-2" v-text="profile[key]"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    profile: Object | null,
  },
  methods: {
    _snakeToPascal(string){
      return string.split('_').map((str) => {
        return this._upperFirst(
          str.split('/')
          .map(this._upperFirst)
          .join('/'));
      }).join(' ');
    },

    _upperFirst(string) {
      return string.slice(0, 1).toUpperCase() + string.slice(1, string.length);
    }
  }
}
</script>