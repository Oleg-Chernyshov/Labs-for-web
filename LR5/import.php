<?php
require_once 'logic.php';

if(isset($_POST['Import'])) {
    $linc = db_connect();
    $query = "CREATE TABLE IF NOT EXISTS repair_orders_imported(id INT,Image_path VARCHAR(255), Essence_of_the_work VARCHAR(255), Description VARCHAR(255), Cost INT, Id_repair INT);";
    $result = mysqli_query($linc, $query);
    $res_import = 0;
    $way = $_POST['import_data'];

    if(preg_match("/^.*\.(csv)$/iu",$way)) {
        if(file_exists($way)) {
            $query = "TRUNCATE repair_orders_imported";
            $result = mysqli_query($linc, $query);
            $handle = fopen($way, 'r');
            $i = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                foreach ($data as $element)
                    $element = $linc->real_escape_string($element);
                $import = "INSERT into repair_orders_imported(id,Image_path,Essence_of_the_work,Description,Cost,Id_repair)values('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "','" . $data[3] . "','" . $data[4] . "','" . $data[5] . "')";
                mysqli_query($linc, $import);
            }
            $result = mysqli_query($linc, "SELECT COUNT(*) FROM repair_orders_imported");
            $goods = mysqli_fetch_row($result);
            $count = $goods[0];
            $res_import = 1;
        }
    }
}