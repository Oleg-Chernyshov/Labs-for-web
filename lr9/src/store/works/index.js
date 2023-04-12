import store from '..';
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
      if(state.items.length === 0)
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
      state.items = /* filter */ state.items.filter(({type}) => type === filter) 
    }
  },
  actions: {
    fetchItems: async ({ commit }) => {
      const response = await api.works();
      const items = await response.json();
      commit('setItems', items)
    },
    removeItem: async ({ commit }, id) => {
      const idRemovedItem = await api.remove(id);
      commit('removeItem', idRemovedItem);

    },
    addItem: async ({ commit }, { name, description, price, type }) => {
      const item = await api.add({ name, description, price, type })
      commit('setItem', item)
    },
    updateItem: async ({ commit }, { id, description, price, type }) => {
      const item = await api.update({ id, description, price, type });
      commit('updateItem', item);
    },
    filter: async ({ commit }, { type }) => {
      const filter = await api.filter(type)
      commit("filterTypes", filter)
    },
  },
}
