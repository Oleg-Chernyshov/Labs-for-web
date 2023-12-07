<template>
  <div class="row q-mt-lg">
    <div class="card col-4">
      <div class="row">
        <div class="col-3">
          <q-icon name="show_chart" class="icon" size="54px" />
        </div>
        <div class="col-7 q-mt-sm">
          <div class="text-body">
            {{ count + " ₽" }}
          </div>
          <div class="text-body">Общий доход от продаж</div>
        </div>
      </div>
    </div>
    <div class="col-4"></div>
    <div class="card col-4">
      <div class="row">
        <div class="col-3">
          <q-icon name="call_made" class="icon" size="54px" />
        </div>
        <div class="col-7 q-mt-sm">
          <div class="text-body">
            {{ max + " ₽" }}
          </div>
          <div class="text-body">Максимальная стоимость товара</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const { count, max } = defineProps({
  count: Number,
  max: Number,
});
</script>

<style scoped></style>
