export const fetchItems = ( store ) => {
  const { dispatch } = store;
  dispatch('types/fetchItems');
};

export const selectItems = ( store ) => {
  const { getters } = store;
  return getters['types/items']
}

export const removeItem = ( store, id ) => {
  const { dispatch } = store;
  dispatch('types/removeItem', id);
}

export const addItem = ( store, { type, description } ) => {
  const { dispatch } = store;
  dispatch('types/addItem', { type, description });
}

export const updateItem = ( store, { id, type, description }) => {
  const { dispatch } = store;
  dispatch('types/updateItem', { id, type, description });
}

export const selectItemById = (store, id) => {
  const { getters } = store;
  return getters['types/itemsByKey'][id] || {};
}
