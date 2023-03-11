<?php

class TypesTable extends Table
{

    public static function getItems()
    {
        $pdo = dbPdo::getPdo();
        $sql = "SELECT id,name FROM `types`";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getRuTable(): string
    {
        return 'Категории';
    }

    public static function getItemById($id)
    {
        $pdo = dbPdo::getPdo();
        $sql = "SELECT id,name FROM `types`
				WHERE types.id = '$id'
		";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
