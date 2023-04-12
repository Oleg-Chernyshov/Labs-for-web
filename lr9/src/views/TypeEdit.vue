<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <TypeForm
        :id="id"
        @submit="onSubmit"
    />
  </Layout>
</template>

<script>
import { useStore } from 'vuex';

import { updateItem, addItem } from '@/store/types/selectors';
import Layout from '@/components/Layout/Layout';
import TypeForm from '@/components/TypeForm/TypeForm';
export default {
  name: 'TypeEdit',
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
      onSubmit: ({ id, type, description }) => id ?
          updateItem(store, { id, type, description }) :
          addItem(store, { type, description }),
    };
  }
}
</script>

