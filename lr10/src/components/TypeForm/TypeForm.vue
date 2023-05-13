<template>
  <div :class="$style.root">
    <div v-if="form.type_id" :class="$style.item">
      <div :class="$style.label">
        <label for="id">id</label>
      </div>
      <input
        :value="form.type_id"
        disabled
        :class="$style.input"
        id="id"
        placeholder="id"
        type="text"
      />
    </div>
    <div :class="$style.item">
      <div :class="$style.label">
        <label for="name">Название типа</label>
      </div>
      <input
        v-model="form.type_name"
        :class="$style.input"
        id="name"
        placeholder="Название"
        type="text"
      />
    </div>
    <div :class="$style.item">
      <Btn @click="onClick" :disabled="!isValidForm" theme="info"
        >Сохранить</Btn
      >
    </div>
  </div>
</template>

<script>
import { computed, reactive, onBeforeMount, watchEffect } from "vue";
import { useStore } from "vuex";
import { useRouter } from "vue-router";

import {
  selectItemById,
  fetchItems,
  selectItems,
} from "@/store/types/selectors";
import Btn from "@/components/Btn/Btn";
export default {
  name: "TypeForm",
  components: {
    Btn,
  },
  props: {
    id: { type: String, default: "" },
  },
  setup(props, context) {
    const store = useStore();
    const router = useRouter();
    const groupList = computed(() => selectItems(store));
    const form = reactive({
      type_id: "",
      type_name: "",
    });

    onBeforeMount(() => {
      fetchItems(store);
    });

    watchEffect(() => {
      const type = selectItemById(store, props.id);
      Object.keys(type).forEach((key) => {
        form[key] = type[key];
      });
    });

    return {
      groupList,
      form,
      isValidForm: computed(() => !!form.type_name),
      onClick: () => {
        context.emit("submit", form);
        router.push({ name: "Types" });
      },
    };
  },
};
</script>

<style module lang="scss">
.root {
  padding-top: 30px;
  max-width: 900px;

  .item {
    display: flex;
    align-items: center;

    & + .item {
      margin-top: 15px;
    }
  }

  .label {
    flex: 0 0 150px;
  }

  .input {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
  }

  .select {
    display: block;
    width: 100%;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    appearance: none;
  }
}
</style>
