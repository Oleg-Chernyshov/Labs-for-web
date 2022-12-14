<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR67_my/db.php");

class TableModule
{
    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \BadMethodCallException("Unable to deserialize database connection");
    }


    public static function start()
    {
        $stmt = Database::query("SELECT *
                                          FROM `repair orders` 
                                          INNER JOIN `types of breakdowns` ON `repair orders`.`Id repair` = `types of breakdowns`.Id_repair");
        $data = $stmt->fetchAll();
        $stmt = Database::query("SELECT * FROM `types of breakdowns`");
        $types = $stmt->fetchAll();
        return array($data, $types);
    }

    public static function create_record()
    {
        $img_path = (isset($_FILES['img']['name'])) ? $_FILES['img']['name'] : "";
        $name = (isset($_POST['name'])) ? $_POST['name'] : "";
        $type = (isset($_POST['type'])) ? $_POST['type'] : "";
        $description = (isset($_POST['description'])) ? $_POST['description'] : "";
        $cost = (isset($_POST['cost'])) ? intval($_POST['cost']) : "";

        $stmt = Database::prepare("INSERT INTO `repair orders` (image_path, `Essence of the work`, `Id repair`, Description, Cost) VALUES (:i, :n, :t, :d, :c)");
        $stmt->bindValue(":i", $img_path, PDO::PARAM_STR);
        $stmt->bindValue(":n", $name, PDO::PARAM_STR);
        $stmt->bindValue(":t", $type, PDO::PARAM_INT);
        $stmt->bindValue(":d", $description, PDO::PARAM_STR);
        $stmt->bindValue(":c", $cost, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: index.php");
    }


    public static function delete_record()
    {
        $id = intval($_POST['delete']);
        $stmt = Database::query("SELECT image_path FROM `repair orders` WHERE Id = $id");
        $img_p = $stmt->fetch()['image_path'];

        $file = $_SERVER['DOCUMENT_ROOT'] . "/LR67_my/img/" . $img_p;
        unlink($file);

        Database::query("DELETE FROM `repair orders` WHERE Id = $id");
        header("Location: index.php");
    }

    public static function update_record()
    {
        $id = $_POST['update'];
        $img_path = (isset($_FILES['img']['name'])) ? $_FILES['img']['name'] : "";
        $name = (isset($_POST['name'])) ? $_POST['name'] : "";
        $type = (isset($_POST['type'])) ? $_POST['type'] : "";
        $description = (isset($_POST['description'])) ? $_POST['description'] : "";
        $cost = (isset($_POST['cost'])) ? intval($_POST['cost']) : "";


        $stmt = Database::prepare("UPDATE `repair orders` SET `Essence of the work` = :n, `Id repair` = :t,
                           Description = :d, Cost = :c WHERE Id = :id");
        $stmt->bindValue(":n", $name, PDO::PARAM_STR);
        $stmt->bindValue(":t", $type, PDO::PARAM_INT);
        $stmt->bindValue(":d", $description, PDO::PARAM_STR);
        $stmt->bindValue(":c", $cost, PDO::PARAM_INT);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($img_path != "") {
            $stmt = Database::prepare("SELECT image_path FROM `repair orders` WHERE id = :id");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $dat = $stmt->fetch();

            unlink($_SERVER['DOCUMENT_ROOT'] . "/LR67_my/img/" . $dat['image_path']);
            $stmt = Database::prepare("UPDATE `repair orders` SET image_path = :i WHERE Id = :id");
            $stmt->bindValue(":i", $img_path, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: index.php");
        }
    }
}