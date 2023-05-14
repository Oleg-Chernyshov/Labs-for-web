<?php
require_once "singleton.php";

abstract class TableModule
{
	abstract protected function getTableName(): string;

	/**
	 * @param int $id
	 * @throws PDOException
	 */
	public function delete($id)
	{
        $name = $this->getTableName();
        if($name == 'orders') {
            $sql = "DELETE FROM " . $name . " WHERE id=:id";
        }
        else{
            $sql = "DELETE FROM " . $name . " WHERE type_id=:id";
        }
		$query = Singleton::prepare($sql);
		if (!$query->execute(array(":id" => $id))) {
			throw new PDOException("При удалении произошла ошибка");
		}
	}
	/**
	 * @param array $fields
	 * @return array
	 */
	public function read($fields = array())
	{
        $name = $this->getTableName();
        if($name == 'orders'){
            $sql = "SELECT * FROM " . $name . " inner join `types` on orders.id_repair = types.type_id";
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
	 * @param array $fields
	 * @throws PDOException
	 */
	public function create($fields)
	{
		$keys = [];
		$keyparam = [];
		$arField = [];
		foreach ($fields as $key => $field) {
			$keys[] = " " . $key;
			$keyparam[] = " :" . $key;
			$arField[":" . $key] = $field;
		}
		$keys = implode(", ", $keys);
		$keys = "(" . $keys . ")";
		$keyparam = implode(", ", $keyparam);
		$keyparam = "(" . $keyparam . ")";
		$sql = "INSERT INTO " . $this->getTableName() . " " . $keys . " VALUE " . $keyparam;
		$query = Singleton::prepare($sql);
		if (!$query->execute($arField)) {
			throw new PDOException("При добавлении произошла ошибка");
		}
	}
	/**
	 * @param array $fields
	 * @throws PDOException
	 */
	public function update($fields)
	{
		$keyparam = [];
		$arField = [];
		foreach ($fields as $key => $field) {
			if ($key != "id" || $key != "type_id") {
				$keyparam[] = " `$key`=:" . $key;
			}
			$arField[":" . $key] = $field;
		}
		$keyparam = implode(", ", $keyparam);
        $name = $this->getTableName();
        if($name == 'orders')
            $sql = "UPDATE " . $name. " SET " . $keyparam . " WHERE id=". $fields['id'];
        else
            $sql = "UPDATE " . $name . " SET " . $keyparam . " WHERE type_id=". $fields['type_id'];
		$query = Singleton::prepare($sql);
		if (!$query->execute($arField)) {
			throw new PDOException("При обновлении произошла ошибка");
		}
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function exists($id): bool
	{
        $name = $this->getTableName();
        if($name == 'types'){
            $query = Singleton::prepare("SELECT * FROM " . $this->getTableName() . " WHERE type_id=" . $id);
        }
		else
            $query = Singleton::prepare("SELECT * FROM " . $this->getTableName() . " WHERE id=" . $id);
		$query->execute([]);
		$find = $query->fetch();
		return boolval($find);
	}
	/**
	 * @return int
	 */
	public function lastID():int
	{
		$query = Singleton::prepare("SELECT MAX(ID) FROM " . $this->getTableName());
		$query->execute([]);
		$find = $query->fetch();
		return intval($find["MAX(ID)"]);
	}

    public function filter($id){
        $query = Singleton::prepare("SELECT * FROM " . $this->getTableName() . " inner join `types` on orders.id_repair = types.type_id  WHERE id_repair=" . $id);
        $query->execute([]);
        $result = array();
        while ($slice = $query->fetch()) {
            $result[] = $slice;
        }
        return $result;
    }
}