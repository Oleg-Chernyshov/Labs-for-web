<!DOCTYPE html>
<html>
<?php include "logic_text.php"?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Обработка текста</title>
    <link rel="stylesheet" href="Boostrap/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Boostrap/bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <?php include "header.php"?>
</header>
<body>
    <div class="container">
        <div class="row">
            <a href="Service.php">Вернуться на главную</a>
        </div>
        <div class="row py-3">
            <form action="text.php" method="post" autocomplete="off">
                <textarea wrap="hard" placeholder="Введите текст" class="form-control" name="text"><?php if (isset($_POST['text'])) echo $_POST['text'] ?></textarea>
                <div class="pt-2">
                    <button type="submit" name="Zd1" class="btn btn-primary">Вывести все заголовки</button>
                </div>
                <div class="pt-2">
                    <button type="submit" name="Zd2" class="btn btn-primary">Убрать повторяющиеся знаки препинания</button>
                </div>
                <div class="pt-2">
                    <button type="submit" name="Zd3" class="btn btn-primary">Указатель таблиц</button>
                </div>
                <div class="pt-2">
                    <button type="submit" name="Zd4" class="btn btn-primary">Подстветить повторы</button>
                </div>
            </form>
            <h4 class="py-2">Результат:</h4>
            <?php
                if(isset($res_1)){?>
                    <ol>
                        <?php foreach($res_1 as $element) { ?>
                            <li> <?php echo (htmlspecialchars($element->plaintext))?></li>
                        <?php }?>
                    </ol>
                <?php }
            ?>
            <?php
                if(isset($res_2)){
                    echo ("<textarea class='form-control'>".$res_2."</textarea>");
                }
            ?>
            <?php
                if(isset($res_3)){
                    foreach ($res_3 as $element){
                        echo $element;
                    }
                    echo $_POST['text'];
                }
            ?>
            <p>
            <?php
            if(isset($res_4)){
                foreach ($res_4 as $element){
                    echo $element." ";
                }
            }
            ?>
            </p>
        </div>
    </div>
</body>
<footer><?php include "footer.php"?></footer>
</html>