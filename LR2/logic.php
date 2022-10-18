<?php

$server = "127.0.0.1";
$login = "root";
$pass= "";
$name_db = "repair orders";
$linc = mysqli_connect($server,$login,$pass,$name_db);

if(isset($_POST['reset'] ) ) {
    $_POST['Name'] = "";
    $_POST['Description'] = "";
    $_POST['TypeWork'] = "";
    $_POST['Price_start'] = "";
    $_POST['Price_end'] = "";
}

function addWhere($where,$add,$and = true){
    if ($where) {
        if ($and) $where .= " AND $add";
        else $where .= " OR $add";
    }
    else $where = $add;
        return $where;
}
$sql = "SELECT * FROM repair_orders INNER JOIN types_of_breakdowns ON types_of_breakdowns.Id_repair = repair_orders.Id_repair";
if (isset($_POST['filter'])) {
    $where = "";
    if ($_POST["Price_start"]) $where = addWhere($where, "`Cost` >= '".htmlspecialchars($_POST["Price_start"]))."'";
    if ($_POST["Price_end"]) $where = addWhere($where, "`Cost` <= '".htmlspecialchars($_POST["Price_end"]))."'";
    if ($_POST["TypeWork"])   $where = addWhere($where, "`Name_of_the_repair` = '".htmlspecialchars($_POST["TypeWork"]))."'";
    if ($_POST["Description"])   $where = addWhere($where, "`Description` LIKE'%".htmlspecialchars($_POST["Description"])."%")."'";
    if ($_POST["Name"])   $where = addWhere($where, "`Essence_of_the_work` LIKE'%".htmlspecialchars($_POST["Name"])."%")."'";
    if ($where) $sql .= " WHERE $where";
    $sql.=" ORDER BY Cost";
    //echo $sql;
}
else
    $sql.=" ORDER BY Cost";


?>
