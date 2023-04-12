import Api from '@/api/index';

class Students extends Api {

  /**
   * Вернет список всех студентов
   * @returns {Promise<Response>}
   */
  students = () => this.rest('/students/list.json');

  /**
   * Удалит студента по id
   * @param id
   * @returns {Promise<*>}
   */
  remove = ( id ) => this.rest('/students/delete-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify({ id }),
  }).then(() => id) // then - заглушка, пока метод ничего не возвращает

  /**
   * Создаст новую запись в таблице
   * @param student объект студента, взятый из FormStudent
   * @returns {Promise<Response>}
   */
  add = ( student ) => this.rest('/students/add-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify(student),
  }).then(() => ({...student, id: new Date().getTime()})) // then - заглушка, пока метод ничего не возвращает

  /**
   * Отправит измененную запись
   * @param student объект студента, взятый из FormStudent
   * @returns {Promise<*>}
   */
  update = ( student ) => this.rest('/students/update-item', {
    method: 'POST',
    'Content-Type': 'application/json',
    body: JSON.stringify(student),
  }).then(() => student) // then - заглушка, пока метод ничего не возвращает

}

export default new Students();
