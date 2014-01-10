<?php
ob_start();
session_start();
include_once 'config.php';
$results = array();

if (isset($_GET['q'])) {
    $q = mysql_real_escape_string($_GET['q']);
	$kılavuz=str_replace(" ","%",$q);
        $sql="SELECT * FROM soru WHERE baslik LIKE '%$kılavuz%' ORDER BY id_soru DESC LIMIT 0,10";
        $sonuc=$DB->get_results($sql);
        foreach ($sonuc as $kelime){
            $id=$kelime->id_soru;
            $key=$kelime->baslik;
            $results[] = array($key, $key);
        }
}
$output = 'json';
if (isset($_GET['output'])) {
    $output = strtolower($_GET['output']);
}


if ($output == 'json') {
	
header('Content-Type: application/json; charset=utf8');
echo json_encode($results);
}
?>