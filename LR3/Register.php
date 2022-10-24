
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link rel="stylesheet" href="Boostrap/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Boostrap/bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<?php include 'header.php'?>
<body>
<div class="container">
    <div class="row">
        <div class="col-2 ps-0 pe-2 text-end">
            <a href="Service.php">Домашняя страница</a>
        </div>
        <div class="col-2 px-0 text-start">
            <p> > Регистрация</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 text-start">
            <form action="Register.php" method="post" autocomplete="off">
                <label>Email (Логин) *</label>
                <div class="mb-3">
                    <input type="email" class="form-control" name="Email" placeholder="Enter your email" <?php if (isset($_POST['Email'])){?> value= "<?php echo $_POST['Email'];}?>">
                    <?php if($err['err_email'] == "Required field")
                    {
                    ?> <p style="color: red">Это обязательное поле</p><?php
                    }?>
                    <?php if($check == "Пользователь с таким именем существует!")
                    {
                    ?><p style="color: red">Пользователь с такой почтой уже существует!<?php
                    }?>
                </div>
                <label>ФИО</label>
                <div class="mb-3">
                    <input type="text" class="form-control form-control-danger" name="Name_user" placeholder="Enter your name" value="<?php if (isset($_POST['Name_user'])) echo $_POST['Name_user']?>">
                </div>
                <label>Группа крови</label>
                <div class="mb-3">
                    <select class="form-control" name="Blood_type">
                        <option value=""
                            <?php if(isset($_POST['Blood_type']) && $_POST['Blood_type'] == "")
                                echo ' selected="selected"';
                            ?>
                        ></option>
                        <option value="0 (I)"
                            <?php if(isset($_POST['Blood_type']) && $_POST['Blood_type'] == "0 (I)")
                                echo ' selected="selected"';
                            ?>
                        >0 (I)</option>
                        <option value="А (II)"
                            <?php if(isset($_POST['Blood_type']) && $_POST['Blood_type'] == "А (II)")
                                echo ' selected="selected"';
                            ?>
                        >А (II)</option>
                        <option value="B (III)"
                            <?php if(isset($_POST['Blood_type']) && $_POST['Blood_type'] == "B (III)")
                                echo ' selected="selected"';
                            ?>
                        >B (III)</option>
                        <option value="AB (IV)"
                            <?php if(isset($_POST['Blood_type']) && $_POST['Blood_type'] == "AB (IV)")
                                echo ' selected="selected"';
                            ?>
                        >AB (IV)</option>
                    </select>
                </div>
                    <label>Резус фактор</label>
                    <div class="mb-3">
                        <select class="form-control" name="Rh_factor">
                            <option value=""
                                <?php if(isset($_POST['Rh_factor']) && $_POST['Rh_factor'] == "")
                                    echo ' selected="selected"';
                                ?>
                            ></option>
                            <option value="Положительный (+)"
                                <?php if(isset($_POST['Rh_factor']) && $_POST['Rh_factor'] == "Положительный (+)")
                                    echo ' selected="selected"';
                                ?>
                            >Положительный (+)</option>
                            <option value="Отрицательный (-)"
                                <?php if(isset($_POST['Rh_factor']) && $_POST['Rh_factor'] == "Отрицательный (-)")
                                    echo ' selected="selected"';
                                ?>
                            >Отрицательный (-)</option>
                        </select>
                </div>
                <label>Ссылка на профиль в ВК</label>
                <div class="mb-3">
                     <input type="url" class="form-control" name="Vk_url" placeholder="https://vk.com/YourPage" value="<?php if (isset($_POST['Vk_url'])) echo $_POST['Vk_url']?>">
                </div>
                <label>Ваш пол *</label>
                <div class="mb-3">
                    <select class="form-control" name="Gender">
                        <option value=""
                            <?php if(isset($_POST['Gender']) && $_POST['Gender'] == "")
                                echo ' selected="selected"';
                            ?>
                        ></option>
                        <option value="Мужской"
                            <?php if(isset($_POST['Gender']) && $_POST['Gender'] == "Мужской")
                                echo ' selected="selected"';
                            ?>
                        >Мужской</option>
                        <option value="Женский"
                            <?php if(isset($_POST['Gender']) && $_POST['Gender'] == "Женский")
                                echo ' selected="selected"';
                            ?>
                        >Женский</option>
                    </select>
                    <?php if($err['err_gender'] == "Required field")
                    {
                        ?> <p style="color: red">Это обязательное поле</p><?php
                    }?>
                </div>
                <label>Ваши интересы</label>
                <div class="mb-3">
                    <textarea class="form-control" name="Interes"><?php if (isset($_POST['Interes'])) echo $_POST['Interes'] ?></textarea>
                </div>
                <label>Ваша дата рождения *</label>
                <div class="mb-3">
                    <input type="date" class="form-control" name="Date" value="<?php if (isset($_POST['Date'])) echo $_POST['Date']?>">
                    <?php if($err['err_date'] == "Required field")
                    {
                        ?> <p style="color: red">Это обязательное поле</p><?php
                    }?>
                    <?php if($err['err_email'] == "Invalid date")
                    {
                        ?> <p style="color: red">Введите корректную дату</p><?php
                    }?>
                </div>
                <label>Ваш адрес проживания (Город)</label>
                <div class="md-3">
                    <input type="text" class="form-control" name="Home" value="<?php if (isset($_POST['Home'])) echo $_POST['Home']?>">
                </div>
                <label>Введите пароль *</label>
                <div class="mb-3">
                    <input type="password" class="form-control" name="Password" placeholder="Enter password" value="<?php if (isset($_POST['Password'])) echo $_POST['Password']?>">
                    <?php if($err['err_pas'] == "Required field")
                    {
                        ?> <p style="color: red">Это обязательное поле</p><?php
                    }?>
                    <?php if($err['err_pas'] == "Invalid pas")
                    {
                        ?> <p style="color: red">Пароль должен содержать спецсимволы, болшие и маленькие буквы, цифры, -, _ , пробел, не содержать латиницы и быть длинее 6ти символов</p><?php
                    }?>
                </div>
                <label>Повторите пароль *</label>
                <div class="mb-3">
                    <input type="password" class="form-control" name="Password_repl" placeholder="Repeat password">
                    <?php if($err['err_pas_rep'] == "Required field")
                    {
                        ?> <p style="color: red">Это обязательное поле</p><?php
                    }
                    if($err['err_pas_rep'] == "Passwords don't match"){
                        ?> <p style="color: red">Пароли должны совпадать</p> <?php
                    }
                    ?>
                </div>
                <button type="submit" name="Register" class="btn btn-primary" >Зарегистрироваться</button>
            </form>
            <p>*-Обязательные поля</p>
            Уже есть аккаунт? <a href="Enter.php">Войдите</a>
        </div>
    </div>
</div>
</body>
<?php include 'footer.php'?>
</html>