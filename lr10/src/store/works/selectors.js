export const fetchItems = (store) => {
  const { dispatch } = store;
  dispatch('works/fetchItems');
};

export const selectItems = (store) => {
  const { getters } = store;
  return getters['works/items']
}

export const removeItem = (store, id) => {
  const { dispatch } = store;
  dispatch('works/removeItem', id);
}

export const addItem = (store, { name, description, cost, type_name }) => {
  const { dispatch } = store;
  dispatch('works/addItem', { name, description, cost, type_name });
}

export const updateItem = (store, { id, name, description, cost, type_name }) => {
  const { dispatch } = store;
  dispatch('works/updateItem', { id, name, description, cost, type_name });
}

export const selectItemById = (store, id) => {
  const { getters } = store;
  return getters['works/itemsByKey'][id] || {};
}

export const filter = (store, type_id) => {
  const { dispatch } = store;
  dispatch('works/filter', { type_id })
}
