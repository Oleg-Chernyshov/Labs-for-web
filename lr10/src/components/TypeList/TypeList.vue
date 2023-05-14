<template>
  <div :class="$style.root">
    <Table
      :headers="[
        { isStudents: 'false' },
        { value: 'type_id', text: 'ID' },
        { value: 'type_name', text: 'Тип' },
        { value: 'control', text: 'Действие' },
      ]"
      :items="items"
    >
      <template v-slot:control="{ item }">
        <Btn @click="onClickEdit(item['type_id'])" theme="info">Изменить</Btn>
        <Btn @click="onClickRemove(item['type_id'])" theme="danger"
          >Удалить</Btn
        >
      </template>
    </Table>
    <RouterLink :to="{ name: 'TypeEdit' }">
      <Btn :class="$style.create" theme="info">Создать</Btn>
    </RouterLink>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { computed, onMounted } from "vue";
import { useRouter } from "vue-router";

import { selectItems, removeItem, fetchItems } from "@/store/types/selectors";
import Table from "@/components/Table/Table";
import Btn from "@/components/Btn/Btn";
export default {
  name: "TypeList",
  components: {
    Btn,
    Table,
  },
  setup() {
    const store = useStore();
    const router = useRouter();
    const items = computed(() => selectItems(store));
    onMounted(() => {
      fetchItems(store);
    });
    return {
      items,
      onClickRemove: (id) => {
        const isConfirmRemove = confirm(
          "Вы действительно хотите удалить запись?"
        );
        if (isConfirmRemove) {
          removeItem(store, id);
          fetchItems(store);
        }
      },
      onClickEdit: (id) => {
        router.push({ name: "TypeEdit", params: { id } });
      },
    };
  },
};
</script>

<style module lang="scss">
.root {
  .create {
    margin-top: 16px;
  }
}
</style>
