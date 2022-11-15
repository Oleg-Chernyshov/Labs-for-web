<?php
include "simple_html_dom.php";
//Presets===============================================================================================================
if(isset($_GET['preset'])){
    if($_GET['preset'] == 1){
        $dom = file_get_html("https://ru.wikipedia.org/wiki/Киноринхи");
        foreach($dom->find('div[class="mw-parser-output"]') as $element)
            $_POST['text'] = $element;
    }
    if($_GET['preset'] == 2){
        $dom=file_get_html("https://www.gazeta.ru/culture/2021/12/16/a_14322589.shtml");
        foreach($dom->find('div[class="b_article-text"]') as $element)
            $_POST['text'] = $element;
    }
    if($_GET['preset'] == 3){
        $dom=file_get_html("https://mishka-knizhka.ru/skazki-dlay-detey/zarubezhnye-skazochniki/skazki-alana-milna/vinni-puh-i-vse-vse-vse/");
        foreach($dom->find('div[class="entry-content"]') as $element)
            $_POST['text'] = $element;
    }
}
//Zd1===================================================================================================================
$res_1 = [];
if (isset($_POST['Zd1'])&&$_POST['text']!="") {
    $dom = str_get_html($_POST['text']);
    $res_1 = $dom->find('h1,h2');
}
//Zd2===================================================================================================================
if (isset($_POST['Zd2'])&&$_POST['text']!="") {
    $str = $_POST['text'];
    $str = preg_replace("/[!]{4,}/","!!!", $str);
    $str = preg_replace("/[.]{4,}/","...", $str);
    $str = preg_replace("/[?]{1,}/","?", $str);
    $str = preg_replace("/[,]{1,}/",",", $str);
    $res_2 = $str;
}
//Zd3===================================================================================================================
if (isset($_POST['Zd3'])&&$_POST['text']!="") {
    $dom = str_get_html($_POST['text']);
    $num = 1;
    $res_3 = [];
    foreach($dom->find("tbody") as $element){
        $table_text=$element->first_child()->plaintext;
        $element->id="table$num";
        $res_3[] =  '<a href="#table'.$num.'">Таблица номер '.$num.'</a><div>'.$table_text.'</div>';
        $num++;
    }
    $_POST['text'] = $dom;
}
//Zd4===================================================================================================================
if (isset($_POST['Zd4'])&&$_POST['text']!="") {
    $array_text = explode(' ',$_POST['text']);
    $flag = 0;
    for($i=0;$i<count($array_text)-1;$i++){
        if($array_text[$i] == $array_text[$i+1]){
            $array_text[$i] = "<span style='text-decoration: underline;text-decoration-color: red;'>".$array_text[$i]."</span>";
            $flag = 1;
        }
        elseif($flag == 1){
            $array_text[$i] = "<span style='text-decoration: underline;text-decoration-color: red;'>".$array_text[$i]."</span>";
            $flag = 0;
        }
    }
    if($flag == 1){
        $array_text[array_key_last($array_text)] = "<span style='text-decoration: underline;text-decoration-color: red;'>".$array_text[array_key_last($array_text)]."</span>";
    }
    $res_4 = $array_text;
}
?>
