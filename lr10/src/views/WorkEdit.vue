<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <WorkForm @submit="onSubmit" :id="id" />
  </Layout>
</template>

<script>
import { useStore } from "vuex";

import { updateItem, addItem } from "@/store/works/selectors";
import WorkForm from "@/components/WorkForm/WorkForm";
import Layout from "@/components/Layout/Layout";

export default {
  name: "WorkEdit",
  props: {
    id: String,
  },
  components: {
    Layout,
    WorkForm,
  },
  setup() {
    const store = useStore();
    return {
      onSubmit: ({ id, name, description, cost, type_name }) =>
        id
          ? updateItem(store, { id, name, description, cost, type_name })
          : addItem(store, { name, description, cost, type_name }),
    };
  },
};
</script>
