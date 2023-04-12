export const fetchItems = ( store ) => {
  const { dispatch } = store;
  dispatch('groups/fetchItems');
};

export const selectItems = ( store ) => {
  const { getters } = store;
  return getters['groups/items']
}

export const removeItem = ( store, id ) => {
  const { dispatch } = store;
  dispatch('groups/removeItem', id);
}

export const addItem = ( store, { type, description } ) => {
  const { dispatch } = store;
  dispatch('groups/addItem', { type, description });
}

export const updateItem = ( store, { id, type, description }) => {
  const { dispatch } = store;
  dispatch('groups/updateItem', { id, type, description });
}

export const selectItemById = (store, id) => {
  const { getters } = store;
  return getters['groups/itemsByKey'][id] || {};
}
