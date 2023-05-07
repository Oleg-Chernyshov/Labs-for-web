import Api from '@/api/index';

class Types extends Api {

  /**
   * Вернет список всех групп
   * @returns {Promise<Response>}
   */
  types = () => this.rest('/types/list.json');

  /**
   * Удалит группу по id
   * @param id
   * @returns {Promise<*>}
   */
  remove = ( id ) => this.rest('/types/delete-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify({ id }),
  }).then(() => id) // then - заглушка, пока метод ничего не возвращает

  /**
   * Создаст новую запись в таблице
   * @param type объект группы, взятый из TypeGroup
   * @returns {Promise<Response>}
   */
  add = ( type ) =>  this.rest('/types/add-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify(type),
  }).then(() => ({...type, id: new Date().getTime()})) // then - заглушка, пока метод ничего не возвращает

  /**
   * Отправит измененную запись
   * @param type объект группы, взятый из TypeGroup
   * @returns {Promise<*>}
   */
  update = ( type ) => this.rest('/types/update-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify(type),
  }).then(() => type) // then - заглушка, пока метод ничего не возвращает

}

export default new Types();
