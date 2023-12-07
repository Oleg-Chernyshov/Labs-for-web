<?php
require_once "singleton.php";

abstract class TableModule
{
	abstract protected function getTableName(): string;

	/**
	 * @return array
	 */
	public function read()
	{
        $name = $this->getTableName();
		if($name == 'orders'){
			$sql = "SELECT * FROM " . $name . ' inner join `products` on product_id = products.products_id';
		}
		else{
			$sql = "SELECT * FROM " . $name;
		}
		$query = Singleton::prepare($sql);
		$query->execute([]);
		$result = array();
		while ($slice = $query->fetch()) {
			$result[] = $slice;
		}
		return $result;
	}

	/**
	 * @return array
	 */
	public function get_max_price_product()
	{	
		$sql = "SELECT product_cost FROM products ORDER BY product_cost DESC LIMIT 1";
		$query = Singleton::prepare($sql);
		$query->execute([]);
		while ($slice = $query->fetch()) {
			$result[] = $slice;
		}
		return $result;
	}

	/**
	 * @return array
	 */
	public function get_order_bar_data()
	{	
		$sql = "SELECT DATE_FORMAT(create_date, '%Y-%m') AS month, COUNT(*) AS orders_count FROM orders GROUP BY month;";
		$query = Singleton::prepare($sql);
		$query->execute([]);
		while ($slice = $query->fetch()) {
			$result[] = $slice;
		}
		return $result;
	}
}