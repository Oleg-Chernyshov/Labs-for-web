<?php

class OrdersTable extends Table
{

    public static function getItems()
    {
        $pdo = dbPdo::getPdo();
        $sql = "SELECT orders.id,
                orders.name,
                orders.image_path,
                orders.id_repair, 
                orders.description, 
                orders.cost, 
                types.name as types_of_breakdowns_name FROM `orders`
				inner join `types` on orders.id_repair = types.id
		";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getRuTable(): string
    {
        return 'Товары';
    }

    public static function getItemById($id)
    {
        $pdo = dbPdo::getPdo();
        $sql = "SELECT orders.id,
                orders.name,
                orders.image_path,
                orders.id_repair, 
                orders.description, 
                orders.cost FROM `orders`
				inner join `types` on orders.id_repair = types.id
				WHERE orders.id = '$id'
		";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getItemsByFilter($id){
        $pdo = dbPdo::getPdo();
        $sql = "SELECT orders.id,
                orders.name,
                orders.image_path,
                orders.id_repair, 
                orders.description, 
                orders.cost,
                types.name as types_of_breakdowns_name FROM `orders`
				inner join `types` on orders.id_repair = types.id
				WHERE orders.id_repair = '$id'
		";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
