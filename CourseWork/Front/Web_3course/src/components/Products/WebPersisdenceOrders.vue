<template>
  <div class="card">
    <div class="row">
      <div class="col-3">
        <q-icon name="settings" class="icon" size="54px" />
      </div>
      <div class="col-9 q-mt-sm">
        <div class="text-body">
          {{ count + " %" }}
        </div>
        <div class="text-body">Средний процент брака</div>
      </div>
    </div>
  </div>
</template>

<script setup>
const { count } = defineProps({
  count: Number,
});
</script>

<style scoped></style>
