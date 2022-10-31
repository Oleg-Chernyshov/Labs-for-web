<?php

function db_connect()
{
    $server = "127.0.0.1";
    $login = "root";
    $pass = "";
    $name_db = "repair orders";
    $linc = mysqli_connect($server, $login, $pass, $name_db);
    return $linc;
}
//============================================Register===========================================================
function validate_data_and_create(&$err,$linc)
{
    $exit = 0;
    if (!$_POST['Email']) {
        $err['err_email'] = "Required field";
        $exit = 1;
    }
    if (!$_POST['Gender']) {
        $err['err_gender'] = "Required field";
        $exit = 1;
    }
    if (!$_POST['Date']) {
        $err['err_date'] = "Required field";
        $exit = 1;
    }
    else{
        $date = substr($_POST['Date'],0,4);
        (int)$date;
        if(!(1900<$date && $date<2022)) {
            $err['$err_date'] = "Invalid date";
            $exit = 1;
        }
    }
    if (!$_POST['Password']) {
        $err['err_pas'] = "Required field";
        $exit = 1;
    }
    else {
        $_POST['Password'] = $linc->real_escape_string($_POST['Password']);
        $pass = $_POST['Password'];
        $pass = preg_match('/(?=.*[0-9])(?=.*[ !@#$%^&*,.+])(?=.*[a-z])(?=.*-)(?=.* )(?=.*_)(?=.*[A-Z])[0-9a-zA-Z!@#$%^&* _-]{6,}/',$pass);
        if (!$pass) {
            $err['err_pas'] = "Invalid pas";
            $exit = 1;
        }
        else
            $pass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    }
    if (!$_POST['Password_repl']) {
        $err['$err_pas_rep'] = "Required field";
        $exit = 1;
    }
    $_POST['Email'] = $linc->real_escape_string($_POST['Email']);
    $_POST['Name_user'] = $linc->real_escape_string($_POST['Name_user']);
    $_POST['Vk_url'] = $linc->real_escape_string($_POST['Vk_url']);
    $_POST['Interes'] = $linc->real_escape_string($_POST['Interes']);
    $_POST['Home'] = $linc->real_escape_string($_POST['Home']);

    if($_POST['Password']!=$_POST['Password_repl']){
        $err['$err_pas_rep'] = "Passwords don't match";
    }

    if(!($exit))
        $create_err = create_user($_POST['Email'],$pass,$_POST['Name_user'],$_POST['Blood_type'],$_POST['Rh_factor'],$_POST['Vk_url'],$_POST['Gender'],$_POST['Date'],$_POST['Interes'],
                                                                                                                                                                $_POST['Home'],$linc);
    if(isset($create_err))
        return $create_err;
}
function create_user($mail,$password,$name,$blood_type,$rh_factor,$vk_link,$gender,$date_of_birth,$interes,$adress,$linc){
    $sel = "SELECT * FROM users WHERE users.Mail = '$mail'";
    $res = mysqli_query($linc,$sel);
    $num = mysqli_num_rows($res);
    if($num == 0) {
        $sql = "insert into users (Mail, Password,Name,Blood_type,Rh_factor,Vk_link,Gender,Date_of_birth,Interes,Adress ) values ('$mail','$password','$name','$blood_type',
                                                                                                              '$rh_factor','$vk_link','$gender','$date_of_birth','$interes','$adress')";
        $result = mysqli_query($linc,$sql);
        if($result)
        {
            header('Location: enter.php');
            return "Вы зарегистрированы!";
        }
        else  {
            return "Внутренняя ошибка";
        }
    }
    else {
        return "Пользователь с таким именем существует!";
    }
}
//===============================================Login===========================================================
function check_user($linc){
        if (!empty($_POST['Email2']) && !empty($_POST['Password2'])) {

            $username = $linc->real_escape_string($_POST['Email2']);
            $password = $linc->real_escape_string($_POST['Password2']);
            $query = mysqli_query($linc, "SELECT * FROM users WHERE Mail='$username'");
            $row = mysqli_fetch_assoc($query);

            if (!isset($row['Password']) or password_verify($password, $row['Password']) !== true) {
                return "Invalid username or password!";
            } elseif (password_verify($password, $row['Password']) === true) {
                $_SESSION['session_username'] = $username;
                header("Location: Service.php");
            }
        }
}
//================================================Programm==========================================================
session_start();
$linc = db_connect();
$check = 0;
$err_pas = 0;
$err = ['err_email' => "",'err_gender' => "",'err_date' => "",'err_pas' => "",'err_pas_rep' => ""];
if(isset($_POST['Register'])) {
    $check = validate_data_and_create($err, $linc);
    }
if(isset($_POST['reset'] ) ) {
    $_POST['Name'] = "";
    $_POST['Description'] = "";
    $_POST['TypeWork'] = "";
    $_POST['Price_start'] = "";
    $_POST['Price_end'] = "";
}
if (isset($_POST['Check_user'])) {
    $err['err_pas'] = check_user($linc);
}
if (isset($_POST['Exit'])) {
    session_destroy();
    header("Location: Service.php");
}
//================================================Filter=============================================================
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
//=================================================================================================================
?>
