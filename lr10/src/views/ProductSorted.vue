<template>
  <Layout title="Работы">
    <ProductSortedList />
  </Layout>
</template>

<script>
import Layout from "@/components/Layout/Layout";
import ProductSortedList from "@/components/ProductSortedList/ProductSortedList.vue";
import Btn from "@/components/Btn/Btn.vue";

export default {
  name: "Product",
  components: {
    Layout,
    ProductSortedList,
    Btn,
  },
};
</script>
