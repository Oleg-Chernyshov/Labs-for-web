<?php
require_once("../../core/index.php");
$title = TypesTable::getRuTable();
$columns = TypesTable::getAllColumn();
$table = TypesTable::getTableName();
$values = isset($_GET['item_id']) ? TypesTable::getItemById($_GET['item_id']) : '';

TypesActions::add() == true  ? header("Location: ../../pages/types/") : $errors = "<p class='text-danger'>Необходимо заполнить все поля</p>";
TypesActions::edit() == true ? header("Location: ../../pages/types/") : $errors = "<p class='text-danger'>Необходимо заполнить все поля</p>";

require_once("../template.php");