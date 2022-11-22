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
$h = [];
if (isset($_POST['Zd1'])&&$_POST['text']!="") {
    $dom = str_get_html($_POST['text']);
    $h = $dom->find('h1,h2');
    foreach ($h as $element){
        $res_1[] = htmlspecialchars($element->plaintext);
    }
}
//Zd2===================================================================================================================
if (isset($_POST['Zd2'])&&$_POST['text']!="") {
    $str = $_POST['text'];
    $str = preg_replace("/[!]{4,}/u","!!!", $str);
    $str = preg_replace("/[.]{4,}/u","...", $str);
    $str = preg_replace("/[?]{1,}/u","?", $str);
    $str = preg_replace("/[,]{1,}/u",",", $str);
    $res_2 = $str;
}
//Zd3===================================================================================================================
if (isset($_POST['Zd3'])&&$_POST['text']!="") {
    $dom = str_get_html($_POST['text']);
    $num = 1;
    $res_3 = [];
    foreach($dom->find("tbody") as $element){
        $table_text=$element->first_child()->first_child()->plaintext;
        $element->id="table$num";
        $res_3[] =  '<a href="#table'.$num.'">Таблица номер '.$num.'</a><div>'.$table_text.'</div>';
        $num++;
    }
    $_POST['text'] = $dom;
}
//Zd4===================================================================================================================
if (isset($_POST['Zd4'])&&$_POST['text']!="") {
    $dom = str_get_html($_POST['text']);
    $forbidden_words = ["пух", "рот", "делать", "ехать", "около", "для"];
    $k = 0;
    foreach($dom->find("text") as $element) {
        $str = explode(" ", $element->plaintext);
        foreach($str as $word) {
            foreach ($forbidden_words as $forbidden) {
                if(preg_match("/^".$forbidden.".*$/u",mb_strtolower($word))){
                    $word = str_replace($forbidden,str_repeat("#",mb_strlen($forbidden)),mb_strtolower($word));
                    $str[$k] = $word;
                }
            }
            $k++;
        }
        $k = 0;
        $res_4 = "";
        for($i = 0;$i<count($str);$i++)
            $res_4 .= $str[$i]." ";
        $element->innertext = $res_4;
    }
    $_POST['text'] = $dom;
}
?>
