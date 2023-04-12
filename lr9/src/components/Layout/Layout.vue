<template>
  <div :class="$style.root">
    <h1 v-if="title" :class="$style.title">{{title}}</h1>
    <div :class="$style.content">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  name: 'Layout',
  props: {
    title: { type: String }
  }
}
</script>

<style module lang="scss">
.root {
  line-height: 1.3;
  box-sizing: border-box;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
  .title {
    text-align: center;
    font-size: 28px;
  }
}
</style>
