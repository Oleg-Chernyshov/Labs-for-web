import Api from '@/api/index';

class Works extends Api {

  /**
   * Вернет список всех студентов
   * @returns {Promise<Response>}
   */
  works = () => this.rest('/works/list.json',{
    method: 'GET',
  });

  /**
   * Вернет отфлильтрованный список работ
   * @param works объект работы, взятый из FormStudent
   * @returns {Promise<*>}
   */
  filter = (type) => this.rest('/works/list-filtred.json')

  /**
   * Удалит работу по id
   * @param id
   * @returns {Promise<*>}
   */
  remove = ( id ) => this.rest('/works/delete-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "id=" + JSON.stringify(id)
  }).then(() => id) // then - заглушка, пока метод ничего не возвращает

  /**
   * Создаст новую запись в таблице
   * @param student объект работы, взятый из FormWorks
   * @returns {Promise<Response>}
   */
  add = (work) => this.rest('/works/add-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "work="+JSON.stringify(work)
          
  }).then(() => (work)) // then - заглушка, пока метод ничего не возвращает

  /**
   * Отправит измененную запись
   * @param work объект работы, взятый из FormStudent
   * @returns {Promise<*>}
   */
  update = ( work ) => this.rest('/works/update-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "work="+JSON.stringify(work)
  }).then(() => work) // then - заглушка, пока метод ничего не возвращает


}

export default new Works();
