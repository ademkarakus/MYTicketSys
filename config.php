<?php
error_reporting(1);

include_once "lib/ezSQL/shared/ez_sql_core.php";
include_once "lib/ezSQL/mysqli/ez_sql_mysqli.php";

$DB = new ezSQL_mysqli('root','','myticketsystem','localhost');
if(mysqli_connect_errno()){ //veritabanında hata kontolu yapıyoruz
    printf("hata", mysqli_connect_errno()); //hata varsa hatayı göster
    exit; //programın çalışmasını durdur
}
$DB->query('SET character_set_client = utf8;');
$DB->query('SET character_set_results = utf8;');
$DB->query('SET character_set_connection = utf8;');

$DB->show_errors();