<template>
  <div :class="$style.root">
    <Table
      :headers="[
        { isMaterial: 'true' },
        { value: 'material_id', text: 'ID' },
        { value: 'material_name', text: 'Тип' },
        { value: 'control', text: 'Действие' },
      ]"
      :items="items"
    >
      <template v-slot:control="{ item }">
        <Btn
          @click="onClickEdit(item['material_id'], item['material_name'])"
          theme="info"
          >Изменить</Btn
        >
        <Btn @click="onClickRemove(item['material_id'])" theme="danger"
          >Удалить</Btn
        >
      </template>
    </Table>
    <RouterLink :to="{ name: 'MaterialEdit' }">
      <Btn :class="$style.create" theme="info">Создать</Btn>
    </RouterLink>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { computed, onMounted } from "vue";
import { useRouter } from "vue-router";

import {
  selectItems,
  removeItem,
  fetchItems,
} from "@/store/material/selectors";
import Table from "@/components/Table/Table";
import Btn from "@/components/Btn/Btn";
export default {
  name: "MaterialList",
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
        console.log(id);
        const isConfirmRemove = confirm(
          "Вы действительно хотите удалить запись?"
        );
        if (isConfirmRemove) {
          removeItem(store, id);
          setTimeout(() => {
            fetchItems(store);
          }, 100);
        }
      },
      onClickEdit: (id, name) => {
        router.push({ name: "MaterialEdit", params: { id: id, name: name } });
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
