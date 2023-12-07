export const fetchItems = ( store ) => {
  const { dispatch } = store;
  dispatch('material/fetchItems');
};

export const selectItems = ( store ) => {
  const { getters } = store;
  return getters['material/items']
}

export const removeItem = ( store, id ) => {
  const { dispatch } = store;
  dispatch('material/removeItem', id);
}

export const addItem = ( store, { material_name } ) => {
  const { dispatch } = store;
  dispatch('material/addItem', { material_name });
}

export const updateItem = ( store, { material_id, material_name }) => {
  const { dispatch } = store;
  dispatch('material/updateItem', { material_id, material_name });
}

export const selectItemById = (store, material_id) => {
  const { getters } = store;
  return getters['material/itemsByKey'][material_id] || {};
}
