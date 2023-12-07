<template>
  <div class="q-mt-lg header">Заказчики:</div>
  <div class="row">
    <w-count-customers
      class="col-4 q-mt-md"
      :count="customers.length"
      :difference="difference"
    />
    <div class="col-4"></div>
    <w-money-customers class="col-4 q-mt-md" :count="money" />
  </div>
</template>

<script setup>
import WCountCustomers from "src/components/Customers/WebCountCustomers.vue";
import WMoneyCustomers from "src/components/Customers/WebMoneyCustomers.vue";

const { customers } = defineProps({
  customers: Array,
});

const date = new Date();
let difference = 0;
let count = 0;
let money = 0;
let prev_count = 0;

const cur_month = date.getMonth() + 1;

customers.forEach((el) => {
  money += el.balance;
  let el_month = el.register_date.split("-")[1];
  if (el_month == cur_month) {
    count++;
  }
  if (el_month == cur_month - 1) {
    prev_count++;
  }
});
difference = ((count - prev_count) / prev_count) * 100;
</script>
