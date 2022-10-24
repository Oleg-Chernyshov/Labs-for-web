<?php include 'logic.php'?>
<div class="header">
    <div class="col-2">
        <button type="button" class="btn btn-light">Подписаться на новости</button>
    </div>
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
                <div class="login pb-4">
                    <?php if(!isset($_SESSION['session_username'])){ ?>
                    <h5>Вы не авторизованы</h5>
                    <a href="enter.php">Ввести логин и пароль</a> или <a href="Register.php">зарегестрироваться</a>
                    <?php
                    }
                    else{?>
                    <h5>Вы авторизованы</h5>
                    <p>Добро пожаловать <?php echo $_SESSION['session_username'] ?> </p>
                        <form action="logic.php" method="post">
                        <button type="submit" class="btn btn-danger" name="Exit">Выйти</button>
                        </form>
                    <?php }?>
                </div>
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