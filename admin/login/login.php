<?php
session_start();
require_once '../../config.php';

//atamalar
$email =  strip_tags($_POST['email']);
$password = strip_tags($_POST['parola']);

//kontroller
$hataMesaj = array();

if( empty( $email ) || empty( $password ) ){
    $hataMesaj[] = 'Email veya şifre boş bırakılamaz.';
}

if( strlen( $email ) > 255 || strlen($password) > 40 ){
    $hataMesaj[] = 'Email 255 karakterden uzun olamaz.';
    $hataMesaj[] = 'Şifre 40 karakterden uzun olamaz';
}

if( count($hataMesaj ) == 0 ){
    $sql = "SELECT count(*) FROM kullanici WHERE email= '$email' && password= SHA1('$password') && status=1 ;";
    $sayi = $DB->get_var( $sql ); 
    
    if( $sayi == 1 ){
        $_SESSION['oturumAcildi'] = 1;
        header("Refresh: 2; url=../index.php");
        echo '<br>';
        echo '<center><font color=black size=5>Admin Paneline yonlendiriliyorsunuz..</font></center>';
        exit;
    }else{
        $hataMesaj[] = 'Email ya da şifre hatalı.';
    }
}

if( count($hataMesaj)>0 ){
    $_SESSION['hataMesaj'] = $hataMesaj;
    header('Location: index.php');
    exit; 
}

