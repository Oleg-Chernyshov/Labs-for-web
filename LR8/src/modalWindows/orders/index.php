<?php
require_once("../../core/index.php");
$title = OrdersTable::getRuTable();
$columns = OrdersTable::getAllColumn();
$table = OrdersTable::getTableName();
$values = isset($_GET['item_id']) ? OrdersTable::getItemById($_GET['item_id']) : '';
if(!empty($_FILES)){
    $errors = GeneralLogic::checkImg($_FILES['item_image_path']);
    if (OrdersActions::validatePrice($_POST['item_cost']) && $errors){
        if (OrdersActions::add() === true) {
            GeneralLogic::pushImg($_FILES['item_image_path']);
            header("Location: ../../pages/orders");
        }
        else
            $errors = "<p class='text-danger'>Необходимо заполнить все поля</p>";
        if (OrdersActions::edit() === true) {
            GeneralLogic::editImg($_FILES['item_image_path'], $values[0]['image_path']);
            header("Location: ../../pages/orders");
        }
        else
            $errors = "<p class='text-danger'>Необходимо заполнить все поля</p>";
    }
    else if(empty($_POST['item_cost'])){
        $errors = "<p class='text-danger'>Необходимо заполнить все поля</p>";
    }
    else if($errors == 0) {
        $errors = "<p class='text-danger'>Ошибка в файле</p>";
    }
    else{
        $errors = "<p class='text-danger'>Неверная цена</p>";
    }
}
else if(!isset($_POST['item_cost']))
    $errors = "<p>Необходимо добавить файл</p>";

require_once("../template.php");