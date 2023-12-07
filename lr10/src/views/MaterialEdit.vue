<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <MaterialForm :id="id" :name="name" @submit="onSubmit" />
  </Layout>
</template>

<script>
import { useStore } from "vuex";

import { updateItem, addItem } from "@/store/material/selectors";
import Layout from "@/components/Layout/Layout";
import MaterialForm from "@/components/MaterialForm/MaterialForm";
export default {
  name: "MaterialEdit",
  props: {
    id: String,
    name: String,
  },
  components: {
    Layout,
    MaterialForm,
  },
  setup() {
    const store = useStore();
    return {
      onSubmit: ({ material_id, material_name }) =>
        material_id
          ? updateItem(store, { material_id, material_name })
          : addItem(store, { material_name }),
    };
  },
};
</script>
