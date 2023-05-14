<?php
require_once "tableModule.php";

class Works extends TableModule
{
	protected function getTableName(): string
	{
		return "orders";
	}
}