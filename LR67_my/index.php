<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/LR67_my/logic.php");
$result = TableModule::start();
$data = $result[0];
$types = $result[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js" defer></script>
</head>
<body>
<!-- Change -->
<div id="change" style="position: fixed; bottom: 0; background: lightgray;" class="w-100 d-none">
    <form id="form2" class="container" method="POST" enctype="multipart/form-data">
        <h2>Изменить ремонт</h2>
        <div class="row mt-2">
            <div class="col">
                <input name="img" type="file">
            </div>
            <div class="col">
                <input id="change_name" name="name" type="text" class="form-control w-100" placeholder="Название ремонта">
            </div>
            <div class="col">
                <select id="change_type" name="type" class="form-select w-100">
                    <?php
                    $sel_count = 1;
                    foreach ($types as $t) {
                        $tt = $t['Name of the repair'];
                        echo "<option value='$sel_count'>$tt</option>";
                        $sel_count++;
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <input id="change_desc" name="description" type="text" class="form-control w-100" placeholder="Описание ремононта">
            </div>
            <div class="col">
                <input id="change_cost" name="cost" type="text" class="form-control w-100" placeholder="Цена">
            </div>
        </div>
        <div class="d-flex mt-2 mb-2">
            <button id="send" name="update" class="btn btn-primary" type="submit">Отправить</button>
            <button id="cancel" type="button" class="btn btn-danger h-50 ms-2">Отменить</div>
        </div>
    </form>
</div>
<!-- Main table -->
<div class="container">
    <h1 class="mt-5">Ремонт</h1>
</div>
<table class="table table-bordered container table-striped">
    <thead>
    <tr class="text-center">
        <th>Картинка</th>
        <th>Название</th>
        <th>Тип</th>
        <th>Описание</th>
        <th>Цена</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 1;
    foreach($data as $row) {
        $r_id = htmlspecialchars($row['Id']);
        echo "<td width='200' id='td$r_id 1'><img width='200' src='img/" . htmlspecialchars($row['Image_path']) . "'></td>";
        echo "<td  id='td$r_id 2'>" . $row['Essence of the work'] . "</td>";
        echo ("<td width='100' id='td$r_id 3' value='" . "'>" . htmlspecialchars($row['Name of the repair']) . "</td>");
        echo "<td id='td$r_id 4'>" . htmlspecialchars($row['Description']) . "</td>";
        echo "<td width='100' id='td$r_id 5'>" . htmlspecialchars($row['Cost']) . "</td>";
        ?>
        <td>
            <button id="change<?php echo $count?>" data-id="<?php echo $r_id;?>"
                    class='col-11 btn btn-primary' name="change" type="button">Изменить</button>
            <div class="col-12">&ensp;</div>
            <form method="POST" action="">
                <button class='col-11 btn btn-danger' name="delete" type="submit"
                        value="<?php echo $r_id; ?>">Удалить</button>
            </form>
        </td>
    </tbody>
        <?php
        $count++;
    }
    ?>
</table>
<!-- Add -->
<input style="display: none;" data-rows="<?php echo $count; ?>" id="rows">
<div class="container" id="rows" data-rows="<?php echo $count; ?>">
    <button class="btn btn-primary mb-2" onclick="document.getElementById('form').classList.remove('d-none')">Добавить</button>
</div>
<form id="form" class="mt-5 mb-5 d-none container" method="POST" enctype="multipart/form-data">
    <h2>Добавить запись</h2>
    <div class="row mt-2">
        <div class="col">
            <input name="img" type="file">
        </div>
        <div class="col">
            <input name="name" type="text" class="form-control w-100" placeholder="Название ремонта">
        </div>
        <div class="col">
            <select name="type" class="form-select w-100">
                <?php
                $sel_count = 1;
                foreach ($types as $t) {
                    $tt = htmlspecialchars($t['Name of the repair']);
                    echo "<option value='$sel_count'>$tt</option>";
                    $sel_count++;
                }
                ?>
            </select>
        </div>
        <div class="col">
            <input name="description" type="text" class="form-control w-100" placeholder="Описание ремонта">
        </div>
        <div class="col">
            <input name="cost" type="number" class="form-control w-100" placeholder="Цена">
        </div>
    </div>
    <button name="create" class="btn btn-primary mt-4" type="submit">Отправить</button>
</form>
</body>