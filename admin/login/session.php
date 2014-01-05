<?php 
ob_start();
session_start();
error_reporting(0);
if( !( isset($_SESSION['oturumAcildi']) && $_SESSION['oturumAcildi'] == 1 ) ){
    header('Location: login/index.php');
    exit;
}
?>