<?php include_once "../config.php";
include_once "../kontroller.php";
include_once "../lib/Kullanici.php";
$knt=new kontroller();

$link ="index.php?islem=tekrar_yanitla";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;
if($_POST){
    $baslik=strip_tags($_POST['baslik']);
    $soru=strip_tags($_POST['soru']);
    $dosya=$_POST['dosya'];
    $tarih=date('Y-m-d H:i:s');
    
    $hatamesaj=array();
    
    if(empty($baslik)){
        $baslik[]='Ad Boş Bırakılamaz.';
    }
    if(strlen($baslik)>255){
        $hata[]='Başlık 255 karakterden büyük olamaz';
    }
    if(empty($soru)){
        $hatamesaj[]='Soru Boş Bırakılamaz.';
    }
    $sql="INSERT INTO cevap (id_soru, baslik, cevap, tarih, dosya ) "
        . "VALUES ($id, '$baslik', '$soru', '$tarih', '$dosya')";
    $cevapla=$DB->query($sql);
    if($cevapla == TRUE){
            $aktivasyon=new Kullanici();
            //$sql_mail="SELECT ud.id_kullanici, ud.ad, ud.soyad, ud.email, ud.sifreleme, c.baslik, c.cevap FROM uye_detay ud LEFT JOIN cevap c ON ud.id_kullanici = c.id_cevap WHERE ud.id_kullanici = $id ";
            $sql_mail="SELECT * FROM uye_detay WHERE id_kullanici=$id ";
            $mail=$DB->get_row($sql_mail);
            $email=$mail->email;
            $soru="http://localhost/github/MYTicketSys/cevap.php?islem=$mail->sifreleme&id=$id";
            $cevap_sonucu=$aktivasyon->aktivasyonGonder($email, $soru);
    }
    if($cevap_sonucu == TRUE){
            echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Cevap Verildi</span></div></div>';
            header('Refresh: 3; url='.$link.'');
        }else{
            echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Bir problem oluştu.</span></div></div>';
            header('Refresh: 3; url='.$link.'');
            echo $DB->last_error;
            exit;        
    }
}	
?>
<h4 class="anabaslik">Cevap Yaz <?php echo $id; ?></h4>

<form method="post" action="" enctype="multipart/form-data">

<div class="div">
	<li class="sol_li">baslik<span>:</span></li>
	<input type="text" class="input inp3 " name="baslik" id="baslik" value="<?php echo $kullanici->ad; ?>">
</div>

<div class="div">
	<li class="sol_li">Sorunun Cevabı<span>:</span></li><br>
	<br>
	<div>
		<textarea class="ckeditor " name="soru"><?php echo $kullanici->soru; ?></textarea>
	</div>
</div>

 <div class="div">
        <li class="sol_li">Dosya<span>:</span></li>
        <input type="text" name="dosya" value="<?php echo $kullanici->dosya; ?>"/>
      </div>

<input value="<?php echo $_GET['id']; ?>" name="id"  type="hidden" />
<input type="submit" class="button" value="Kaydet"> 
</form>
