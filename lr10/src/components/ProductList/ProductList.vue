<template>
  <div :class="$style.root">
    <Table
      :headers="[
        { isMaterial: 'false' },
        { value: 'id', text: 'ID' },
        { value: 'name', text: 'Название' },
        { value: 'description', text: 'Описание' },
        { value: 'price', text: 'Цена' },
        { value: 'material_name', text: 'Тип' },
        { value: 'control', text: 'Действие' },
      ]"
      :items="items"
    >
      <template v-slot:control="{ item }">
        <Btn
          :class="$style.controlBtn"
          @click="onClickEdit(item.id)"
          theme="info"
          >Изменить</Btn
        >
        <Btn @click="onClickRemove(item.id)" theme="danger">Удалить</Btn>
      </template>
    </Table>
    <router-link :to="{ name: 'ProductEdit' }">
      <Btn :class="$style.create" theme="info">Создать</Btn>
    </router-link>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { computed, onMounted } from "vue";
import { useRouter } from "vue-router";

import { selectItems, removeItem, fetchItems } from "@/store/product/selectors";
import Table from "@/components/Table/Table";
import Btn from "@/components/Btn/Btn";

export default {
  name: "ProductList",
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
      onClickRemove: (id) => {
        const isConfirmRemove = confirm(
          "Вы действительно хотите удалить запись?"
        );
        if (isConfirmRemove) {
          removeItem(store, id);
        }
      },
      onClickEdit: (id) => {
        router.push({ name: "ProductEdit", params: { id } });
      },
      Refresh() {
        fetchItems(store);
        router.push({ name: "Product" });
      },
    };
  },
};
</script>

<style module lang="scss">
.root {
  .create {
    margin-top: 16px;
    margin-bottom: 16px;
  }
}
.myBtn {
  border-radius: 5px;
  background-color: rgb(127, 105, 252);
  color: white;
  margin-bottom: 10px;
}

.controlBtn {
  margin-bottom: 10px;
}
</style>
