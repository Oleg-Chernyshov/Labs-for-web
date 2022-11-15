<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
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
            <p> > Вход в аккаунт</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 text-start">
             <form action="Enter.php" method="post" autocomplete="off">
                 <label>Email</label>
                 <div class="mb-3">
                     <input type="email" class="form-control" name="Email2" placeholder="Enter your email" value="<?php if (isset($_POST['Email2'])) echo $_POST['Email2']?>">
                 </div>
                 <label>Password</label>
                 <div class="mb-3">
                     <input type="password" class="form-control" name="Password2" placeholder="Enter your password">
                 </div>
                 <?php if($err['err_pas'] == "Invalid username or password!"){ ?>
                 <p style="color: red">Неправильный логин или пароль</p>
                 <?php }?>
                 <button type="submit" class="btn btn-primary" name="Check_user">Войти</button>
             </form>
        Еще нет аккаунта? <a href="Register.php">Зарегистрируйтесь</a>
        </div>
    </div>
</div>
<?php include 'footer.php'?>
<script src="Boostrap/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
