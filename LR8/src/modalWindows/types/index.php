<?php
require_once("../../core/index.php");
$title = TypesTable::getRuTable();
$columns = TypesTable::getAllColumn();
$table = TypesTable::getTableName();
$values = isset($_GET['item_id']) ? TypesTable::getItemById($_GET['item_id']) : '';

TypesActions::add() == true ? header("Location: ../../pages/types/") : '';
TypesActions::edit() == true ? header("Location: ../../pages/types/") : '';

require_once("../template.php");