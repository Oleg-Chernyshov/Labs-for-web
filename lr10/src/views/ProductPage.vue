<template>
  <Layout title="Товары">
    <ProductList />
  </Layout>
</template>

<script>
import Layout from "@/components/Layout/Layout";
import ProductList from "@/components/ProductList/ProductList";
import Btn from "@/components/Btn/Btn.vue";

export default {
  name: "Product",
  components: {
    Layout,
    ProductList,
    Btn,
  },
};
</script>
