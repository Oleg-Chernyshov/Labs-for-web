<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <GroupForm
        :id="id"
        @submit="onSubmit"
    />
  </Layout>
</template>

<script>
import { useStore } from 'vuex';

import { updateItem, addItem } from '@/store/groups/selectors';
import Layout from '@/components/Layout/Layout';
import GroupForm from '@/components/GroupForm/GroupForm';
export default {
  name: 'GroupEdit',
  props: {
    id: String,
  },
  components: {
    Layout,
    GroupForm,
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

