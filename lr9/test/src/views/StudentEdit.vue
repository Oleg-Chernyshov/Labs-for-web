<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <StudentForm @submit="onSubmit" :id="id"  />
  </Layout>
</template>

<script>
import { useStore } from 'vuex';

import { updateItem, addItem } from '@/store/students/selectors';
import StudentForm from '@/components/StudentForm/StudentForm';
import Layout from '@/components/Layout/Layout';

export default {
  name: 'StudentEdit',
  props: {
    id: String,
  },
  components: {
    Layout,
    StudentForm,
  },
  setup() {
    const store = useStore();
    return {
      onSubmit: ({ id, name, surname, patronymic, group }) => id ?
          updateItem(store, { id, name, surname, patronymic, group }) :
          addItem(store, { name, surname, patronymic, group } )
    }
  }

}
</script>

