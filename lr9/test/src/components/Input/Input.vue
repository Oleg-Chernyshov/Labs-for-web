<template>
  <input :class="$style.root" :id="id" :placeholder="placeholder">
</template>

<script>
export default {
  name: 'Input',
  props: {
    placeholder: String,
    id: String,
  }
}
</script>

<style module lang="scss">
.root {

}
</style>
