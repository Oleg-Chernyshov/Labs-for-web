
import api from './api';

export default {
  namespaced: true,
  state: {
    items: []
  },
  getters: {
    items: state => state.items,
    itemsByKey: state => state.items.reduce((res, cur) => {
      res[cur['id']] = cur;
      return res;
    }, {}),
  },
  mutations: {
    setItems: (state, items) => {
      state.items = items;
    },
    setItem: (state, item) => {
      state.items.push(item);
    },
    removeItem: (state, idRemove) => {
      state.items = state.items.filter(({ id }) => id !== idRemove)
    },
    updateItem: (state, updateItem) => {
      const index = state.items.findIndex(item => +item.id === +updateItem.id);
      state.items[index] = updateItem;
    },
    filterMaterial: (state, filter) => {
      state.items = filter
    }
  },
  actions: {
    fetchItems: async ({ commit }) => {
      const response = await api.product();
      const items = await response.json();
      commit('setItems', items)
    },
    removeItem: async ({ commit }, id) => {
      const idRemovedItem = await api.remove(id);
      commit('removeItem', idRemovedItem);

    },
    addItem: async ({ commit }, { name, description, price, material_name }) => {
      const item = await api.add({ name, description, price, material_name })
      commit('setItem', item)
    },
    updateItem: async ({ commit }, { id, name, description, price, material_name }) => {
      const item = await api.update({ id, name, description, price, material_name });
      commit('updateItem', item);
    },
    filter: async ({ commit }, { material_id }) => {
      const filter = await api.filter(material_id)
      const items = await filter.json()
      commit("filterMaterial", items)
    },
  },
}
