<?php
require_once 'logic.php';

if(isset($_POST['Export'])){

    $linc = db_connect();
    $result = mysqli_query($linc, 'SELECT * FROM repair_orders INNER JOIN types_of_breakdowns ON types_of_breakdowns.Id_repair = repair_orders.Id_repair ORDER BY Id');
    $name = $_POST['export_data'];
    $res_export = 0;
    if($name and preg_match("/^.*\.(csv)$/iu",$name)) {
        $way = 'tmp/' . $name;
        $fp = fopen($way, "w");
        while ($goods = mysqli_fetch_assoc($result)) {
            fputcsv($fp, $goods);
        }
        $exportURL = 'http://localhost/LR5/worker.php';

        $cFile = curl_file_create($way, 'application/vnd.ms-excel', $name);
        $post = array('file_contents' => $cFile);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $exportURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $res_export = curl_exec($ch);
        curl_close($ch);

        unlink($way);
        fclose($fp);
    }
}
