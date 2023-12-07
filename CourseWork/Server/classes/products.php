<?php
require_once "tableModule.php";

class Product extends TableModule
{
	protected function getTableName(): string
	{
		return "products";
	}
}