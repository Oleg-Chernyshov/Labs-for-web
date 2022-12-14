<?php
require_once "TableModule.php";
//===============================================================Functions
function check_image() {
    if (!isset($_FILES['img'])) {
        return false;
}

    $whitelist = array("image/png", "image/jpg", "image/jpeg");

    if (!in_array($_FILES['img']['type'], $whitelist)) {
        return false;
}

    if ($_FILES['img']['size'] > 10240000) {
        return false;
}

    $upload_file = $_SERVER['DOCUMENT_ROOT'] . "/LR67_my/img/" . $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], $upload_file);
    return true;
}

function error_msg($text)
{
    echo "<div class='container text-danger fs-4 fw-bold'>$text</div>";
}

//===============================================================Main
if (isset($_POST['create'])) {
    if (!check_image()) {
        error_msg("Невозможно загрузить картинку");
        return;
    }
    TableModule::create_record();
}

if (isset($_POST['delete'])) {
    TableModule::delete_record();
}

if (isset($_POST['update'])) {
    if($_FILES['img']['name']!="") {
        if (!check_image()) {
            error_msg("Невозможно загрузить картинку");
            return;
        }
    }
    TableModule::update_record();
}
?>