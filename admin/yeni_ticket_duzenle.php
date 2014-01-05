<?php include_once "../config.php"; ?>
<?php
$link ="index.php?islem=yeni_ticket_duzenle&id=$id";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;

if($islem == 'yeni_ticket_duzenle'){
    $sql1="SELECT ud.id_kullanici, ud.ad, ud.soyad, k.kategori_ad, s.baslik, s.soru, s.tarih, s.dosya, ud.status "
        . "FROM uye_detay ud "
        . "LEFT JOIN kategori k "
        . "ON ud.id_kullanici=k.id_kategori LEFT JOIN soru s "
        . "ON s.id_kullanici= ud.id_kullanici "
        . "WHERE ud.id_kullanici=$id ";
    $kullanici=$DB->get_row($sql1);
    
}
if($_POST){
    
    $ad=$_POST['ad'];
    $soyad=$_POST['soyad'];
    $kategori=$_POST['id_kategori'];
    $baslik=$_POST['baslik'];
    $soru=$_POST['soru'];
    $dosya=$_POST['dosya'];
    
    $sql2="UPDATE uye_detay "
            . "SET id_kategori='$kategori',  ad='$ad',  soyad='$soyad', status=1 "
            . "WHERE id_kullanici=$id";
    $guncelle=$DB->get_row($sql2);
    if($guncelle == 1 ){
        $sql3="UPDATE soru "
            . "SET baslik='$baslik',  soru='$soru',  dosya='$dosya' "
            . "WHERE id_soru=$id";
        $guncelle2=$DB->get_row($sql3);
            if($guncelle2 == 1){
                echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Başari Ile Güncellendi</span></div></div>';
                header('Refresh: 3; url='.$link.'');
            }else{
                echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Güncellenemedi problem oluştu.</span></div></div>';
                header('Refresh: 3; url='.$link.'');
                exit;
    }  
    }
  
}	
?>
<h4 class="anabaslik">Ticket Güncelle <?php echo $id; ?></h4>

<form method="post" action="" enctype="multipart/form-data">

<div class="div">
	<li class="sol_li">Ad<span>:</span></li>
	<input type="text" class="input inp3 " name="ad" id="baslik" value="<?php echo $kullanici->ad; ?>">
</div>
<div class="div">
	<li class="sol_li">Soyad<span>:</span></li>
	<input type="text" class="input inp3 " name="soyad" id="baslik" value="<?php echo $kullanici->soyad ?>">
</div>

        
<div class="div"><li class="sol_li">Onay <span>:</span></li>						
	    <?php
            $sql2="SELECT * FROM kategori";
            $kategoriler=$DB->get_results($sql2);
            ?>
            <select class="input inp2" name="id_kategori">
            <option value="">Seçiniz</option>
            <?php 
            foreach($kategoriler as $kategori){
            ?> 
            <option value="<?php echo $kategori->id_kategori;?>"><?php echo $kategori->kategori_ad; ?></option>
            <?php } ?>
            </select>
</div>    
<div class="div">
	<li class="sol_li">Başlık<span>:</span></li>
	<input type="text" class="input inp3 " name="baslik" id="baslik" value="<?php echo $kullanici->baslik; ?>">
</div>


<div class="div">
	<li class="sol_li">Soru<span>:</span></li><br>
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
