<?php
include 'logic.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Обойма 6D1734</title>
    <link rel="stylesheet" href="Boostrap/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Boostrap/bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="col-2">
    <button type="button" class="btn btn-light">Подписаться на новости</button>
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-3 text-end">
                <img src="Images/logo-zip.png" id="logo">
                <h6>Работаем с 2007 г.</h6>
            </div>
            <div class="col-1 text-center">
                <img src="Images/post3.png">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-outline-dark btn_yellow">Заказать запчасть</button>
                <button type="button" class="btn btn-outline-dark btn_yellow">Заказать ремонт</button>
                <button type="button" class="btn btn-outline-dark btn_yellow">Онлайн система</button>
            </div>
            <div class="col-2">
                <a href="#"><img src="Images/vk.svg" class="Myicon"></a>
                <a href="#"><i class="bi bi-twitter Myicon"></i></a>
                <a href="#"><i class="bi bi-facebook Myicon"></i></a>
                <a href="#"><i class="bi bi-instagram Myicon"></i></a>
                <button type="button" class="btn btn-light" id="sent_to_director">Написать руководству</button>
            </div>
            <div class="col-4">
                    <pre class="contacts"><p>Центральный офис продаж <i class="bi bi-telephone contacts"></i> 8(800)200-99-38
                          +7(495)663-99-38
                          zakaz@zipteh.ru</p></pre>
                <pre class="contacts"><p>Офис продаж ТРАКТ 32км МКАД <i class="bi bi-telephone contacts"></i> 8(800)200-99-38
                               zakaz@zipteh.ru</p></pre>
                <pre class="contacts"><p>Офис в г. Краснодар <i class="bi bi-telephone contacts"></i> +7(861)944-99-38
                    zakaz@costex.com.ru</p></pre>
            </div>
        </div>
    </div>
</div>
<div class="nav">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary text-nowrap" data-bs-toggle="dropdown" aria-expanded="false">
                        Мы диллеры
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ОФИЦИАЛЬНЫЙ ДИСТРИБЬЮТОР CTP</a></li>
                        <li><a class="dropdown-item" href="#">ОФИЦИАЛЬНЫЙ ДИЛЕР AMMANN</a></li>
                        <li><a class="dropdown-item" href="#">ОФИЦИАЛЬНЫЙ ДИСТРИБЬЮТОР CGR GHINASSI</a></li>
                        <li><a class="dropdown-item" href="#">ОФИЦИАЛЬНЫЙ ДИСТРИБЬЮТОР G.A. RICAMBI</a></li>
                        <li><a class="dropdown-item" href="#">ОФИЦИАЛЬНЫЙ ДИСТРИБЬЮТОР USCO ITR</a></li>
                        <li><a class="dropdown-item" href="#">ОФИЦИАЛЬНЫЙ ПРЕДСТАВИТЕЛЬ EURORICAMBI</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary text-nowrap" data-bs-toggle="dropdown" aria-expanded="false">
                        О компании
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">СЕРТИФИКАТЫ КАЧЕСТВА</a></li>
                        <li><a class="dropdown-item" href="#">ВАКАНСИИ</a></li>
                        <li><a class="dropdown-item" href="#">ВИДЕО О КОМПАНИИ</a></li>
                        <li><a class="dropdown-item" href="#">ПРЕЗЕНТАЦИЯ КОМПАНИИ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary text-nowrap" data-bs-toggle="dropdown" aria-expanded="false">
                        Запчасти
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ПРОИЗВОДИТЕЛИ</a></li>
                        <li><a class="dropdown-item" href="#">КАТАЛОГ ЗАПЧАСТЕЙ CAT И KOMATSU</a></li>
                        <li><a class="dropdown-item" href="#">КАТАЛОГ ЗАПЧАСТЕЙ CTP</a></li>
                        <li><a class="dropdown-item" href="#">ЗАПЧАСТИ AMMANN</a></li>
                        <li><a class="dropdown-item" href="#">ЗАПАСНЫЕ ЧАСТИ АБЗ AMMANN</a></li>
                        <li><a class="dropdown-item" href="#">ГИДРАВЛИЧЕСКИЕ НАСОСЫ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary text-nowrap" data-bs-toggle="dropdown" aria-expanded="false">
                    Ремонт/сервис
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    Спецпредложения
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    Гарантия
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    Доставка
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    Тендер
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    Оплата
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    Новости
                </button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary text-nowrap" data-bs-toggle="dropdown" aria-expanded="false">
                    Контакты
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">НАШИ СОТРУДНИКИ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <p class="path">Главная/Товары/Каталог/Обойма 6D1734</p>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-6">
                    <img src="Images/placeholder.png" align=left>
                </div>
                <div class="col-6">
                    <div><h5>Обойма</h5></div>
                    <div><h5 class="info">Артикул:</h5>6D1734</div>
                    <div><h5 class="info">Производитель:</h5>CGR</div>
                    <div><h5 class="info">Применяемость:</h5>CATM</div>
                    <div><h5 class="info">Замены:</h5></div>
                    <input class="form-control" id="quantity" type="text" placeholder=1>
                    <button type="button" class="btn btn-outline-dark btn_yellow2">В КОРЗИНУ</button>
                    <i class="bi bi-check2-square" id="Info_deliv"> В наличии</i>
                    <a href="#" class="info"> Информация о доставке</a>
                </div>
            </div>
            <div class="row"><h5>Похожее</h5></div>
            <div class="row">
                <div class="col-4 similar">
                    <img src="Images/placeholder.png" class="simpng">
                    <h5>569-43-83910</h5>
                    <p>Фильтр в сборе гидравлический для карьерного самосвала Komatsu HD 785 алюминий</p>
                    <button type="button" class="btn btn-outline-dark btn_yellow2">ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
                <div class="col-4 similar">
                    <img src="Images/placeholder.png" class="simpng">
                    <h5>6D125E</h5>
                    <p>Двигатель Komatsu</p>
                    <button type="button" class="btn btn-outline-dark btn_yellow2">ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
                <div class="col-4 similar">
                    <img src="Images/placeholder.png" class="simpng">
                    <h5>1764179</h5>
                    <p>Щуп масляный</p>
                    <button type="button" class="btn btn-outline-dark btn_yellow2">ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
                <div class="col-4 similar">
                    <img src="Images/placeholder.png" class="simpng">
                    <h5>4V7101</h5>
                    <p>Палец крепления рычага ковша фронтального погрузчика САТ 966F сталь</p>
                    <button type="button" class="btn btn-outline-dark btn_yellow2">ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
                <div class="col-4 similar">
                    <img src="Images/placeholder.png" class="simpng">
                    <h5>569-43-83910</h5>
                    <p>Фильтр в сборе гидравлический для карьерного самосвала Komatsu HD 785 алюминий</p>
                    <button type="button" class="btn btn-outline-dark btn_yellow2">ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
                <div class="col-4 similar">
                    <img src="Images/placeholder.png" class="simpng">
                    <h5>4N4946</h5>
                    <p>Шкив генератора двигателя САТ 3406С сталь</p>
                    <button type="button" class="btn btn-outline-dark btn_yellow2">ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
            </div>
        </div>
        <div class="col-3 news">
            <h3>Найти товары</h3>
            <input class="form-control" type="text" placeholder=Поиск по товарам...>
            <button><i class="bi bi-search"></i></button>
            <h3 id="newsheader">Новости</h3>
            <a href="#">Новая партия моторного масла Caterpillar уже у нас!</a>
            <p>1 месяц назад</p>
            <a href="#">Заходите к нам в группу ВК</a>
            <p>3 месяца назад</p>
            <a href="#">Итоги выставки CTT EXPO 2022</a>
            <p>4 месяца назад</p>
            <a href="#">Редуктора хода для экскаваторов Caterpillar</a>
            <p>5 месяцев назад</p>
            <a href="#">Пополнение склада коронками и редукторами.</a>
            <p>5 месяцев назад</p>
            <a href="#">Поздравление с Днём Победы!</a>
            <p>5 месяцев назад</p>
            <a href="#">Долгожданное поступление запчастей CTP на склад.</a>
            <p>6 месяцев назад</p>
            <a href="#">Поздравление с Днём Защитника Отечества!</a>
            <p>7 месяцев назад</p>
            <a href ="#">График работы “ЗИПТЕХ-СЕРВИС” в Новогодние праздники</a>
            <p>10 месяцев назад</p>
            <a href="#">Итоги выставки ЮГАГРО 2021!</a>
            <p>10 месяцев назад</p>
        </div>
    </div>
    <div class="row">
        <h3>Также у нас вы сможете заказать ремонт вашей техники:</h3>
        <h4>Фильтр:</h4>
        <form action="Service.php" method="post" autocomplete="off">
             <label>По цене:</label>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="От" name="Price_start" value="<?php if (isset($_POST['Price_start'])) echo $_POST['Price_start'] ?>">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="До" name="Price_end" value="<?php if (isset($_POST['Price_end'])) echo $_POST['Price_end'] ?>">
            </div>
            <label>По типу работ:</label>
            <div class="mb-3">
                <select class="form-control" name="TypeWork">
                    <option value=""
                        <?php if(isset($_POST['TypeWork']) && $_POST['TypeWork'] == "")
                            echo ' selected="selected"';
                        ?>
                    ></option>
                    <option value="Ремонт двигателя"
                        <?php if(isset($_POST['TypeWork']) && $_POST['TypeWork'] == "Ремонт двигателя")
                            echo ' selected="selected"';
                        ?>
                    >Ремонт двигателя</option>
                    <option value="Ремонт подвески"
                        <?php if(isset($_POST['TypeWork']) && $_POST['TypeWork'] == "Ремонт подвески")
                            echo ' selected="selected"';
                        ?>
                    >Ремонт подвески</option>
                    <option value="Сервис"
                        <?php if(isset($_POST['TypeWork']) && $_POST['TypeWork'] == "Сервис")
                            echo ' selected="selected"';
                        ?>
                    >Сервис</option>
                    <option value="Ремонт проводки"
                        <?php if(isset($_POST['TypeWork']) && $_POST['TypeWork'] == "Ремонт проводки")
                            echo ' selected="selected"';
                        ?>
                    >Ремонт проводки</option>
                    <option value="Кузовной ремонт"
                        <?php if(isset($_POST['TypeWork']) && $_POST['TypeWork'] == "Кузовной ремонт")
                            echo ' selected="selected"';
                        ?>
                    >Кузовной ремонт</option>
                </select>
             </div>
            <label>По описанию работы:</label>
            <div class="mb-3">
                <textarea class="form-control" name="Description"><?php if (isset($_POST['Description'])) echo $_POST['Description'] ?></textarea>
            </div>
            <label>По названию:</label>
             <div class="mb-3">
                <input type="text" class="form-control" name="Name" value="<?php if (isset($_POST['Name'])) echo $_POST['Name'] ?>">
            </div>
            <div class="mb-3">
             <button type="submit" class="btn btn-primary" name="filter">Отфильтровать</button>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-danger" name="reset">Очистить форму</button>
            </div>
        </form>
        <table border="1" width="100%" cellpadding="15">
            <tr>
                <th>Картинка</th>
                <th>Название работы</th>
                <th>Описание работы</th>
                <th>Вид работы</th>
                <th>Цена</th>
            </tr>
            <?php
            $result = mysqli_query($linc,$sql);
            while ($goods = mysqli_fetch_assoc($result))
            {
                ?>
                <tr>
                    <td>
                        <?php echo '<img src="'.'Catalog/'.$goods['Image_path'].'" style="width:300px;height:300px">';?>
                    </td>
                    <td>
                        <?php echo $goods['Essence_of_the_work'] ?>
                    </td>
                    <td>
                        <?php echo $goods['Description'] ?>
                    </td>
                    <td>
                        <?php echo $goods['Name_of_the_repair']?>
                    </td>
                    <td>
                        <?php echo $goods['Cost'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row"><div class="col-1"><img src="Images/logo-zip.png"></div></div>
        <div class="row">
            <div class="col"><a href="#">МЫ ДИЛЛЕРЫ</a></div>
            <div class="col"><a href="#">О КОМПАНИИ</a></div>
            <div class="col"><a href="#">ЗАПЧАСТИ</a></div>
            <div class="col"><a href="#">РЕМОНТ/СЕРВИС</a></div>
            <div class="col"><a href="#">СПЕЦПРЕДЛОЖЕНИЯ</a></div>
            <div class="col"><a href="#">ГАРАНТИЯ</a></div>
            <div class="col"><a href="#">ДОСТАВКА</a></div>
            <div class="col"><a href="#">ТЕНДЕР</a></div>
            <div class="col"><a href="#">ОПЛАТА</a></div>
            <div class="col"><a href="#">НОВОСТИ</a></div>
            <div class="col"><a href="#">КОНТАКТЫ</a></div>
            <hr>
        </div>
        <div class="row">
            <div class="col-8">
                <img src="Images/map.png">
            </div>
            <div class="col-2 filial">
                <p>НАШИ ФИЛИАЛЫ</p>
                <div><i class="bi bi-geo-alt-fill"></i> Москва</div>
                <div><i class="bi bi-geo-alt-fill"></i> Санкт-Питербург</div>
                <div><i class="bi bi-geo-alt-fill"></i> Санкт-Питербург</div>
                <div><i class="bi bi-geo-alt-fill"></i> Архангельск</div>
                <div><i class="bi bi-geo-alt-fill"></i> Белгород</div>
                <div><i class="bi bi-geo-alt-fill"></i> Волгоград</div>
                <div><i class="bi-geo-alt-fill"></i> Воронеж</div>
                <div><i class="bi-geo-alt-fill"></i> Екатеринбург</div>
                <div><i class="bi-geo-alt-fill"></i> Казань</div>
                <div><i class="bi-geo-alt-fill"></i> Калининград</div>
                <button type="button" class="btn btn-outline-dark btn_yellow">ВСЕ ФИЛИАЛЫ</button>
            </div>
            <div class="col-2 text-end">
                <h5>+7(495)663-99-38</h5>
                <h6>zakaz@zipteh.ru</h6>
                <h6>sales@zipteh.ru</h6>
            </div>
            <hr>
        </div>
        <div class="col text-center"> <p>© 2007–2021 ООО «ЗИПТЕХ-СЕРВИС». Все права защищены. Копирование информации с сайта возможно только с письменного разрешения правообладателя сайта.Данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 (2) Гражданского кодекса РФ. zipteh.ru © 2007-2021 *Данный объект интеллектуальной собственности принадлежит компании, входящей в группу компаний Caterpillar. Caterpillar не финансирует, не разрешает и не поддерживает деятельность данного Веб-сайта.</p></div>
        <script src="Boostrap/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    </div>
</div>
</body>
</html>