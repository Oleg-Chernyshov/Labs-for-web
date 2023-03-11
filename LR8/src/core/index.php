<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/db.php');

// абстрактные классы
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/logic.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/table.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/actions.php');

//Основная сущность
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/orders_table.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/orders_actions.php');

//Справочник
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/types_table.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/core/types_actions.php');