<?php
include_once '../config.php';
/**
 * @author adem 
 */
class Kullanici {
    public function kayitYap( $array ) {
        global $DB;
        extract($array);
        
        $sql="INSERT INTO uye_detay(id_kategori, ad, soyad, email, sifreleme, ip, status ) "
                . "VALUES($id_kategori, '$ad', '$soyad', '$email', '$sifrele', '$ip', 1 )";


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
    }
    public function aktivasyonGonder($email, $soru) {
        date_default_timezone_set('Etc/UTC');
        require 'PHPMailer/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->setLanguage('tr');
        $mail->IsSMTP();
        //$mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = ""; //SMTP kullanıcı adı  
        $mail->Password = ""; //SMTP şifre 
        $mail->setFrom('My Ticket Sysytem', 'Web Sitesinden'); //Gönderen kısmında yer alacak e-mail adresi  
        $mail->addReplyTo('mail@karakusadem.com', 'Adem Karakus');
        $mail->addAddress("$email"); // Mail gönderilecek adresleri ekliyoruz.  
        $mail->Subject = 'MY Ticket Sys Web sitenizden bir mesaj var ' . date('d.m.Y H:i:s');
        $mail->msgHTML ("Cevap yanıtınızı Bu Linkten Kontrol Edebilirsiniz<br>$soru");
        $mail->AltBody = $soru;
        
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}