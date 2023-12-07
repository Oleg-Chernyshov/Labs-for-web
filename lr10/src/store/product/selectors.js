export const fetchItems = (store) => {
  const { dispatch } = store;
  dispatch('product/fetchItems');
};

export const selectItems = (store) => {
  const { getters } = store;
  return getters['product/items']
}

export const removeItem = (store, id) => {
  const { dispatch } = store;
  dispatch('product/removeItem', id);
}

export const addItem = (store, { name, description, price, material_name }) => {
  const { dispatch } = store;
  dispatch('product/addItem', { name, description, price, material_name });
}

export const updateItem = (store, { id, name, description, price, material_name }) => {
  const { dispatch } = store;
  dispatch('product/updateItem', { id, name, description, price, material_name });
}

export const selectItemById = (store, id) => {
  const { getters } = store;
  return getters['product/itemsByKey'][id] || {};
}

export const filter = (store, material_id) => {
  const { dispatch } = store;
  dispatch('product/filter', { material_id })
}
