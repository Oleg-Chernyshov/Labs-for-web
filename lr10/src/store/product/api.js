import Api from '@/api/index';

class Product extends Api {

  /**
   * Вернет список всех студентов
   * @returns {Promise<Response>}
   */
  product = () => this.rest('/product/list.json',{
    method: 'GET',
  });

  /**
   * Вернет отфлильтрованный список работ
   * @param product
   * @returns {Promise<*>}
   */
  filter = (material_id) => this.rest('/product/list-filtred.json',{
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "id=" + material_id
  })

  /**
   * Удалит работу по id
   * @param id
   * @returns {Promise<*>}
   */
  remove = ( id ) => this.rest('/product/delete-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "id=" + JSON.stringify(id)
  }).then(() => id) // then - заглушка, пока метод ничего не возвращает

  /**
   * Создаст новую запись в таблице
   * @param product 
   * @returns {Promise<Response>}
   */
  add = (product) => this.rest('/product/add-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "product="+JSON.stringify(product)
          
  }).then(() => (product)) // then - заглушка, пока метод ничего не возвращает

  /**
   * Отправит измененную запись
   * @param product объект работы, взятый из FormStudent
   * @returns {Promise<*>}
   */
  update = ( product ) => this.rest('/product/update-item', {
    method: 'POST',
    headers: {
      "Content-type": 'application/x-www-form-urlencoded'
    },
    body: "product="+JSON.stringify(product)
  }).then(() => product)


}

export default new Product();
