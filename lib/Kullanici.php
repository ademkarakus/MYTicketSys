<?php
include_once '../config.php';
/**
 * @author adem 
 */
class Kullanici {
    public function kayitYap( $array ) {
        global $DB;
        extract($array);
        
        $sql="INSERT INTO uye_detay(id_kategori, ad, soyad, email, ip, status ) "
                . "VALUES($id_kategori, '$ad', '$soyad', '$email', '$ip', 1 )";


        $sonuc = $DB->query( $sql);
        if($sonuc == 1 ){
        $DB->query("INSERT INTO uye_detay VALUES('id_kullanici')");
        $sql2="INSERT INTO soru(id_kullanici, baslik, soru, tarih, dosya ) "
                . "VALUES($DB->insert_id, '$baslik', '$soru', '$tarih', '$dosya' )";
        $sonuc2= $DB->query($sql2);
        if($sonuc2 == 1){
            return true;
        }
        }else{
            return false;
        }
    }/*
    private function aktivasyonGonder() {
        
        
        date_default_timezone_set('Etc/UTC');
        require 'lib/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->setLanguage('tr');
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "mail@karakusadem.com";
        $mail->Password = "257648";
        $mail->setFrom('karakus.adm@gmail.com', 'Web Sitesinden');
        $mail->addReplyTo('mail@karakusadem.com', 'Adem Karakuş');
        $mail->addAddress('adem__karakus@hotmail.com', 'Adem Karakuş');
        $mail->Subject = 'Web sitenizden bir mesaj var' . date('d.m.Y H:i:s');
        $mail->msgHTML($_POST['mesaj']);
        $mail->AltBody = $_POST['mesaj'];
        
        if (!$mail->send()) {
            echo "Mail gönderiminde hata oluştu: " . $mail->ErrorInfo;
        } else {
            echo "Mesaj başarıyla gönderildi!";
        }
    }*/
}