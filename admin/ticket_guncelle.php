<?php include_once "../config.php"; 
$link ="index.php?islem=ticket_duzenle";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;

if($islem =='ticket_guncelle'){
    $sql="SELECT ud.id_kullanici, ud.ad, ud.soyad, ud.email, s.baslik, s.soru "
        . "FROM uye_detay ud "
        . "LEFT JOIN soru s "
        . "ON ud.id_kullanici=s.id_kullanici "
        . "WHERE ud.id_kullanici = $id ";
    $kullanici=$DB->get_row($sql);
}

if($_POST){
    $ad=$_POST['ad'];
    $soyad=$_POST['soyad'];
    $email=$_POST['email'];
    $baslik=$_POST['baslik'];
    $soru=$_POST['soru'];
    
    $sql2="UPDATE uye_detay "
            . "SET ad='$ad', soyad='$soyad', email='$email' "
            . "WHERE id_kullanici=$id";
    $guncelle2=$DB->get_row($sql2);
    
    if($guncelle2 == 0){
    $sql3="UPDATE soru "
            . "SET baslik='$baslik', soru='$soru' "
            . "WHERE id_soru=$id";
    $guncelle3=$DB->get_row($sql3);
    }
    
    if($guncelle3 == 0){
            echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Başari Ile Güncellendi</span></div></div>';
            header('Refresh: 2; url='.$link.'');
        }else{
            echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Güncellenemedi problem oluştu.</span></div></div>';
            header('Refresh: 32; url='.$link.'');
            echo $DB->last_error;
            exit;
}
}
?>
<h4 class="anabaslik">Ticket Güncelle <?php echo $id; ?></h4>
<form method="post" action="" enctype="multipart/form-data">
<div class="div">
    <li class="sol_li">Ad<span>:</span></li>
    <input type="text" class="input inp3 " name="ad" id="ad" value="<?php echo $kullanici->ad; ?>">
</div>

<div class="div">
    <li class="sol_li">Soyad<span>:</span></li>
    <input type="text" class="input inp3 " name="soyad" id="soyad" value="<?php echo $kullanici->soyad; ?>">
</div>

<div class="div">
    <li class="sol_li">email<span>:</span></li>
    <input type="text" class="input inp3 " name="email" id="email" value="<?php echo $kullanici->email; ?>">
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

<input value="<?php echo $_GET['id']; ?>" name="id"  type="hidden" />
<input type="submit" class="button" value="Kaydet"> 
</form>
