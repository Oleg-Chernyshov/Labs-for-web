<template>
  <div class="q-mt-lg header">Товары и заказы:</div>
  <div class="row">
    <w-count-orders
      class="col-4 q-mt-md"
      :count="orders.length"
      :difference="difference"
    />
    <div class="col-4"></div>
    <w-persidence-orders class="col-4 q-mt-md" :count="persistence" />
  </div>
</template>

<script setup>
import WCountOrders from "src/components/Products/WebCountOrders.vue";
import WPersidenceOrders from "src/components/Products/WebPersisdenceOrders.vue";

const { products, orders } = defineProps({
  products: Array,
  orders: Array,
});

const date = new Date();
const cur_month = date.getMonth() + 1;

let persistence = 0;
let difference = 0;
let count = 0;
let prev_count = 0;

products.forEach((el) => {
  persistence += parseInt(el.percentage_mirriage);
});

orders.forEach((el) => {
  let el_month = el.create_date.split("-")[1];
  if (el_month == cur_month) {
    count++;
  }
  if (el_month == cur_month - 1) {
    prev_count++;
  }
});
difference = (((count - prev_count) / prev_count) * 100).toFixed(1);
persistence = persistence / products.length;
</script>
