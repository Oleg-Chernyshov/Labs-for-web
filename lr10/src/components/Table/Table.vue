<template>
  <div :class="$style.root">
    <table v-if="items.length" :class="$style.table">
      <thead :class="$style.head">
        <tr :class="$style.row">
          <th v-for="{ value, text } in headers" :key="value">
            {{ text }}
          </th>
        </tr>
      </thead>
      <tbody :class="$style.body">
        <tr v-for="(item, idx) in items" :key="idx">
          <td v-for="(key, idy) in colKeys" :key="idy">
            <slot :name="key" v-bind="{ item }">
              <div
                v-if="
                  key === 'material_name' && headers[0].isMaterial == 'true'
                "
              >
                <a @click.prevent="filter(item['material_id'])" href="#">{{
                  item[key]
                }}</a>
              </div>
              <div v-else>
                {{ item[key] }}
              </div>
            </slot>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { useRouter } from "vue-router";
import { filter } from "@/store/product/selectors";
export default {
  name: "Table",
  props: {
    items: Array,
    headers: Array,
  },
  computed: {
    colKeys() {
      return this.headers.map(({ value }) => value);
    },
  },
  setup() {
    const store = useStore();
    const router = useRouter();
    return {
      filter(filter_id) {
        filter(store, filter_id);
        router.push({ name: "ProductSorted", params: { filter_id } });
      },
    };
  },
};
</script>

<style module lang="scss">
.root {
  max-width: 1200px;
  .table {
    width: 100%;
    border-collapse: collapse;
    th,
    td {
      padding: 10px;
      text-align: center;
    }

    th {
      border-bottom: 1px solid black;
    }
  }
  .head {
  }
}
img {
  width: 300px;
  height: 200px;
}
</style>
