export const fetchItems = (store) => {
  const { dispatch } = store;
  dispatch('students/fetchItems');
};

export const selectItems = (store) => {
  const { getters } = store;
  return getters['students/items']
}

export const removeItem = (store, id) => {
  const { dispatch } = store;
  dispatch('students/removeItem', id);
}

export const addItem = (store, { name, surname, patronymic, group }) => {
  const { dispatch } = store;
  dispatch('students/addItem', { name, surname, patronymic, group });
}

export const updateItem = (store, { id, name, surname, patronymic, group }) => {
  const { dispatch } = store;
  dispatch('students/updateItem', { id, name, surname, patronymic, group });
}

export const selectItemById = (store, id) => {
  const { getters } = store;
  return getters['students/itemsByKey'][id] || {};
}
