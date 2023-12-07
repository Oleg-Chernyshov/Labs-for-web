import api from './api';

export default {
  namespaced: true,
  state: {
    items: [],
  },
  getters: {
    items: state => state.items,
    itemsByKey: state => state.items.reduce((res, cur) => {
      res[cur['material_id']] = cur;
      return res;
    }, {}),
  },
  mutations: {
    setItems: (state, items) => {
      state.items = items;
    },
    addItem: (state, item) => {
      state.items.push(item);
    },
    removeItem: (state, idRemove) => {
      state.items = state.items.filter((item) => item.material_id !== idRemove);  
    },
    updateItem: (state, updateItem) => {
      const index = state.items.findIndex(item => +item.id === +updateItem.id);
      state.items[index] = updateItem;
    }
  },
  actions: {
    fetchItems: async ({ commit }) => {
      const response = await api.material();
      const items = await response.json();
      commit('setItems', items)
    },
    removeItem: async ({ commit }, id) => {
      await api.remove( id );
      commit('removeItem', id);
    },
    addItem: async ({ commit }, { material_name }) => {
      const item = await api.add({ material_name });
      commit('addItem', item);
    },
    updateItem: async ({ commit }, { material_id, material_name }) => {
      const item = await api.update({ material_id, material_name });
      commit('updateItem', item);
    }
  },
}
