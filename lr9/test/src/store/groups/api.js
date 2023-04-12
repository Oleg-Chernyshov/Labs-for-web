import Api from '@/api/index';

class Groups extends Api {

  /**
   * Вернет список всех групп
   * @returns {Promise<Response>}
   */
  groups = () => this.rest('/groups/list.json');

  /**
   * Удалит группу по id
   * @param id
   * @returns {Promise<*>}
   */
  remove = ( id ) => this.rest('/groups/delete-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify({ id }),
  }).then(() => id) // then - заглушка, пока метод ничего не возвращает

  /**
   * Создаст новую запись в таблице
   * @param type объект группы, взятый из FormGroup
   * @returns {Promise<Response>}
   */
  add = ( type ) =>  this.rest('groups/add-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify(type),
  }).then(() => ({...type, id: new Date().getTime()})) // then - заглушка, пока метод ничего не возвращает

  /**
   * Отправит измененную запись
   * @param type объект группы, взятый из FormGroup
   * @returns {Promise<*>}
   */
  update = ( type ) => this.rest('groups/update-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify(type),
  }).then(() => type) // then - заглушка, пока метод ничего не возвращает

}

export default new Groups();
