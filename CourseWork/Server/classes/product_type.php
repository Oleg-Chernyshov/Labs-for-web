<?php
require_once "tableModule.php";

class ProductType extends TableModule
{
	protected function getTableName(): string
	{
		return "product_type";
	}
}