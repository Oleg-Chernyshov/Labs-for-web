<?php
require_once "tableModule.php";

class Orders extends TableModule
{
	protected function getTableName(): string
	{
		return "orders";
	}
}