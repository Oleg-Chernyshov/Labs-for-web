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
<?php include 'header.php';
 if (!isset($_SESSION['session_username'])) {
     header("Location: enter.php");
 }
?>
<body>
<div class="container">
    <div  class="row">
    <div class="col-2 ps-0 pe-2 text-end">
        <a href="Service.php">Домашняя страница</a>
    </div>
    <div class="col-2 px-0 text-start">
        <p> > Заказ ремонта</p>
    </div>
    </div>
<h4>Фильтр:</h4>
<form action="secret.php" method="post" autocomplete="off">
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
<?php include 'footer.php'?>
<script src="Boostrap/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
