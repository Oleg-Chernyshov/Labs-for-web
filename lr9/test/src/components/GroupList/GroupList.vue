<template>
  <div :class="$style.root">
    <Table
        :headers="[
          {value: 'id', text: 'ID'},
          {value: 'type', text: 'Тип'},
          {value: 'description', text: 'Описание'},
          {value: 'control', text: 'Действие'},
        ]"
        :items="items"
    >
      <template v-slot:control="{ item }">
        <Btn @click="onClickEdit(item.id)" theme="info">Изменить</Btn>
        <Btn @click="onClickRemove(item.id)" theme="danger">Удалить</Btn>
      </template>
    </Table>
    <RouterLink :to="{ name: 'GroupEdit' }">
      <Btn :class="$style.create" theme="info">Создать</Btn>
    </RouterLink>
  </div>
</template>

<script>
import { useStore } from 'vuex';
import { computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';

import { selectItems, removeItem, fetchItems  } from '@/store/groups/selectors'
import Table from '@/components/Table/Table';
import Btn from '@/components/Btn/Btn';
export default {
  name: 'GroupList',
  components: {
    Btn,
    Table,
  },
  setup() {
    const store = useStore();
    const router = useRouter();
    onMounted(() => {
      
      fetchItems(store);
      console.log(selectItems(store));
      console.log("mounted");
    });
    return {
      items: computed(() => selectItems(store)),
      onClickRemove: id => {
        const isConfirmRemove = confirm('Вы действительно хотите удалить запись?')
        if (isConfirmRemove) {
          removeItem(store, id)
        }
      },
      onClickEdit: ( id ) => {
        router.push({ name: 'GroupEdit', params: { id } })
      }
    }
  },
}
</script>

<style module lang="scss">
.root {
  .create {
    margin-top: 16px;
  }
}
</style>
