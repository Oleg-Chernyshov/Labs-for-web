<?php
require_once "tableModule.php";

class Customers extends TableModule
{
	protected function getTableName(): string
	{
		return "customers";
	}
}