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

export const addItem = ( store, { type_name } ) => {
  const { dispatch } = store;
  dispatch('types/addItem', { type_name });
}

export const updateItem = ( store, { type_id, type_name }) => {
  const { dispatch } = store;
  dispatch('types/updateItem', { type_id, type_name });
}

export const selectItemById = (store, type_id) => {
  const { getters } = store;
  return getters['types/itemsByKey'][type_id] || {};
}
