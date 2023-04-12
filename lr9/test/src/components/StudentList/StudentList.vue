<template>
  <div :class="$style.root">
    <Table
      :headers="[
        {value: 'id', text: 'ID'},
        {value: 'name', text: 'Имя'},
        {value: 'surname', text: 'Фамилия'},
        {value: 'patronymic', text: 'Отчество'},
        {value: 'group', text: 'Группа'},
        {value: 'control', text: 'Действие'},
      ]"
      :items="items"
    >
      <template v-slot:control="{ item }">
        <Btn @click="onClickEdit(item.id)" theme="info">Изменить</Btn>
        <Btn @click="onClickRemove(item.id)" theme="danger">Удалить</Btn>
      </template>
    </Table>
    <router-link :to="{ name: 'StudentEdit' }">
      <Btn :class="$style.create" theme="info">Создать</Btn>
    </router-link>
  </div>
</template>

<script>
import { useStore } from 'vuex';
import { computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';

import { selectItems, removeItem, fetchItems } from '@/store/students/selectors';
import Table from '@/components/Table/Table';
import Btn from '@/components/Btn/Btn';

export default {
  name: 'StudentList',
  components: {
    Table,
    Btn,
  },
  setup() {
    const store = useStore();
    const router = useRouter();
    onMounted(() => {
      fetchItems(store);
    });
    return {
      items: computed(() => selectItems(store)),
      onClickRemove: id => {
        const isConfirmRemove = confirm('Вы действительно хотите удалить запись?')
        if (isConfirmRemove) {
          removeItem(store, id)
        }
      },
      onClickEdit: id => {
        router.push({ name: 'StudentEdit', params: { id } })
      }
    }
  }

}
</script>

<style module lang="scss">
.root {

  .create {
    margin-top: 16px;
  }

}
</style>
