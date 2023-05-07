<template>
  <select :class="$style.root">
    <option v-for="(option, idx) in list" :key="idx" :value="option">
      {{ option }}
    </option>
  </select>
</template>

<script>
export default {
  name: 'Select',
  props: {
    list: Array,
  }
}
</script>

<style module lang="scss">
.root {

}
</style>
