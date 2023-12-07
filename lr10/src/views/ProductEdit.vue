<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <ProductForm @submit="onSubmit" :id="id" />
  </Layout>
</template>

<script>
import { useStore } from "vuex";

import { updateItem, addItem } from "@/store/product/selectors";
import ProductForm from "@/components/ProductForm/ProductForm";
import Layout from "@/components/Layout/Layout";

export default {
  name: "ProductEdit",
  props: {
    id: String,
  },
  components: {
    Layout,
    ProductForm,
  },
  setup() {
    const store = useStore();
    return {
      onSubmit: ({ id, name, description, price, material_name }) =>
        id
          ? updateItem(store, { id, name, description, price, material_name })
          : addItem(store, { name, description, price, material_name }),
    };
  },
};
</script>
