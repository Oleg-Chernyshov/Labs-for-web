<?php
require_once "tableModule.php";

class Types extends TableModule
{
	protected function getTableName(): string
	{
		return "types";
	}
}