<template>
  <div class="q-mt-lg header">Распределение продаж по месяцам:</div>
  <div class="flex flex-center">
    <div class="bar">
      <Bar :data="data" :options="options" />
    </div>
  </div>
</template>

<script setup>
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
import { Bar } from "vue-chartjs";
import { ref } from "vue";

ChartJS.register(
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend
);

const { prop_data } = defineProps({
  prop_data: Object,
});

const data = ref({
  labels: [],
  datasets: [
    {
      label: "Заказы",
      backgroundColor: "#f87979",
      data: [],
    },
  ],
});

const getMonth = (number) => {
  const months = [
    "январь",
    "февраль",
    "март",
    "апрель",
    "май",
    "июнь",
    "июль",
    "август",
    "сентябрь",
    "октябрь",
    "ноябрь",
    "декабрь",
  ];

  if (number >= 1 && number <= 12) {
    return months[number - 1];
  } else {
    return "некорректное число";
  }
};

prop_data.forEach((el) => {
  let month = el.month.split("-")[1];
  data.value.labels.push(getMonth(month));
  data.value.datasets[0].data.push(el.orders_count);
});

const options = {
  responsive: true,
  maintainAspectRatio: false,
};
</script>

<style scoped>
.bar {
  height: 400px !important;
  width: 800px !important;
}
</style>
