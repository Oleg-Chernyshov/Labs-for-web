<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <TypeForm :id="id" @submit="onSubmit" />
  </Layout>
</template>

<script>
import { useStore } from "vuex";

import { updateItem, addItem } from "@/store/types/selectors";
import Layout from "@/components/Layout/Layout";
import TypeForm from "@/components/TypeForm/TypeForm";
export default {
  name: "TypeEdit",
  props: {
    id: String,
  },
  components: {
    Layout,
    TypeForm,
  },
  setup() {
    const store = useStore();
    return {
      onSubmit: ({ type_id, type_name }) =>
        type_id
          ? updateItem(store, { type_id, type_name })
          : addItem(store, { type_name }),
    };
  },
};
</script>
