import Api from '@/api/index';

class Material extends Api {

  /**
   * Вернет список всех групп
   * @returns {Promise<Response>}
   */
  material = () => this.rest('/material/list.json');

  /**
   * Удалит группу по id
   * @param id
   * @returns {Promise<*>}
   */
  remove = ( id ) => { console.log(id); this.rest('/material/delete-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "material="+ JSON.stringify({ id }),
  }).then(() => id) // then - заглушка, пока метод ничего не возвращает
}

  /**
   * Создаст новую запись в таблице
   * @param material
   * @returns {Promise<Response>}
   */
  add = ( material ) =>  this.rest('/material/add-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "material="+JSON.stringify(material)
  }).then(() => (material)) // then - заглушка, пока метод ничего не возвращает

  /**
   * Отправит измененную запись
   * @param material
   * @returns {Promise<*>}
   */
  update = ( material ) => this.rest('/material/update-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "material=" + JSON.stringify(material),
  }).then(() => material) // then - заглушка, пока метод ничего не возвращает

}

export default new Material();
