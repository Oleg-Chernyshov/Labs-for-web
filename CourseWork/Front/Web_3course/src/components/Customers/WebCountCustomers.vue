<template>
  <div class="card">
    <div class="row">
      <div class="col-3">
        <q-icon name="person_outline" class="icon" size="54px" />
      </div>
      <div class="col-7 q-mt-sm">
        <div class="text-body">
          {{ count }}
        </div>
        <div class="text-body">Заказчиков</div>
      </div>
      <div class="difference text-body" v-if="difference > 0">
        {{ "+" + difference + "%" }}
        <q-icon name="arrow_upward" />
      </div>
      <div class="difference_low text-body" v-else>
        {{ difference + "%" }}
        <q-icon name="arrow_downward" />
      </div>
    </div>
  </div>
</template>
<script setup>
const { count, difference } = defineProps({
  count: Number,
  difference: Number,
});
</script>
<style scoped>
.difference {
  background: green;
  height: 20px;
  margin-top: 10px;
  padding: 0px 4px;
}
.difference_low {
  background: red;
  height: 20px;
  margin-top: 10px;
  padding: 0px 4px;
}
</style>
