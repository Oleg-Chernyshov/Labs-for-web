
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
    filterTypes: (state, filter) => {
      state.items = filter
      console.log(state.items);
    }
  },
  actions: {
    fetchItems: async ({ commit }) => {
      const response = await api.works();
      console.log(response);
      const items = await response.json();
      console.log(items);
      commit('setItems', items)
    },
    removeItem: async ({ commit }, id) => {
      const idRemovedItem = await api.remove(id);
      commit('removeItem', idRemovedItem);

    },
    addItem: async ({ commit }, { name, description, cost, type_name }) => {
      console.log(cost,type_name);
      const item = await api.add({ name, description, cost, type_name })
      commit('setItem', item)
    },
    updateItem: async ({ commit }, { id, name, description, cost, type_name }) => {
      const item = await api.update({ id, name, description, cost, type_name });
      commit('updateItem', item);
    },
    filter: async ({ commit }, { type }) => {
      const filter = await api.filter(type)
      const items = await filter.json()
      commit("filterTypes", items)
    },
  },
}
