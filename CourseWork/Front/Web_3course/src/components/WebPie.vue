<template>
  <div class="q-mt-lg header">Распределение товаров:</div>
  <div class="flex flex-center">
    <div class="pie">
      <Pie :data="data" :options="options" />
    </div>
  </div>
</template>
<script setup>
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";
import { Pie } from "vue-chartjs";
import { ref } from "vue";

const { orders, product_type } = defineProps({
  orders: Array,
  product_type: Array,
});

ChartJS.register(ArcElement, Tooltip, Legend);

const labels = ref([]);
const values = ref([]);
let i = 0;

product_type.forEach((el) => {
  labels.value.push(el.name);
  values.value[i] = 0;
  i++;
});

orders.forEach((el1) => {
  values.value[el1.type_id - 1] += 1;
});

const data = ref({
  labels: labels.value,
  datasets: [
    {
      backgroundColor: ["#FFD700", "#41B883", "#E46651", "#00D8FF", "#DD1B16"],
      data: values.value,
    },
  ],
});

const options = ref({
  responsive: true,
  maintainAspectRatio: true,
});
</script>

<style scoped>
.pie {
  height: 400px !important;
  width: 400px !important;
}
</style>
