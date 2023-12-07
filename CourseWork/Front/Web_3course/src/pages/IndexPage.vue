<template>
  <q-page
    class="q-px-lg"
    v-if="
      product_type && products && orders && customers && max_price && bar_data
    "
  >
    <w-customers-section :customers="customers.data" />
    <w-product-section :products="products.data" :orders="orders.data" />
    <w-money :count="count" :max="max_price.data[0].product_cost" />
    <w-pie :orders="orders.data" :product_type="product_type.data" />
    <w-bar :prop_data="bar_data.data" />
  </q-page>
</template>

<script setup>
import WCustomersSection from "src/components/Customers/WebCustomersSection.vue";
import WProductSection from "src/components/Products/WebProductSection.vue";
import WMoney from "src/components/WebMoney.vue";
import WPie from "src/components/WebPie.vue";
import WBar from "src/components/WebBar.vue";

import axios from "axios";

import { ref, onMounted } from "vue";

const link = "http://localhost/rest/index.php/";

const product_type = ref();
const products = ref();
const orders = ref();
const customers = ref();
const max_price = ref();
const bar_data = ref();
const count = ref(0);

onMounted(async () => {
  product_type.value = await axios.get(link + "product_type/list.json");
  products.value = await axios.get(link + "products/list.json");
  orders.value = await axios.get(link + "orders/list.json");
  customers.value = await axios.get(link + "customers/list.json");

  orders.value.data.forEach((element) => {
    count.value += element.cost * element.count;
  });

  max_price.value = await axios.get(link + "products/max_cost");
  bar_data.value = await axios.get(link + "orders/bar_data");
});

axios.get(link + "product_type/list.json");
</script>

<style scoped></style>
