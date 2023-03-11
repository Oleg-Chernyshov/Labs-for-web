<?php
require_once("../../core/index.php");
$title = OrdersTable::getRuTable();
$columns = OrdersTable::getAllColumn();
$table = OrdersTable::getTableName();
$values = isset($_GET['item_id']) ? OrdersTable::getItemById($_GET['item_id']) : '';

if (!empty($_POST) &&
    !empty($_FILES) &&
    OrdersActions::validatePrice($_POST['item_cost']) &&
    GeneralLogic::checkImg($_FILES['item_image_path'])) {
    if (OrdersActions::add() === true) {
        GeneralLogic::pushImg($_FILES['item_image_path']);
        header("Location: ../../pages/orders");
    }
    if (OrdersActions::edit() === true) {
        GeneralLogic::editImg($_FILES['item_image_path'], $values[0]['image_path']);
        header("Location: ../../pages/orders");
    }
}


require_once("../template.php");