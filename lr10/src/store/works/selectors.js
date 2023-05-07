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

export const addItem = (store, { name, description, price, type }) => {
  const { dispatch } = store;
  dispatch('works/addItem', { name, description, price, type });
}

export const updateItem = (store, { id, description, price, type }) => {
  const { dispatch } = store;
  dispatch('works/updateItem', { id, description, price, type });
}

export const selectItemById = (store, id) => {
  const { getters } = store;
  return getters['works/itemsByKey'][id] || {};
}

export const filter = (store, type) => {
  const { dispatch } = store;
  dispatch('works/filter', { type })
}
