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
          <td v-for="(key, idx) in colKeys" :key="idx">
            <slot :name="key" v-bind="{ item }">
              <div v-if="key==='type' && headers[0].isStudents==='true'">
                <a @click.prevent="filter(item[key])" href="#">{{ item[key] }}</a>
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
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';
import { filter } from '@/store/works/selectors'
export default {
  name: 'Table',
  props: {
    items: Array,
    headers: Array,
  },
  computed: {
    colKeys() {
      return this.headers.map(({ value }) => value);
    }
  },
  setup(){
    const store = useStore();
    const router = useRouter();
    return{
      filter(filter_id){
        filter(store,filter_id)
        router.push({ name: 'Works' })
      }
    }
  }
}
</script>

<style module lang="scss">
.root {
  max-width: 1200px;
  .table {
    width: 100%;
    border-collapse: collapse;
    th, td {
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

</style>
