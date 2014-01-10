<?php include_once "../config.php"; ?>
<?php
error_reporting(1);
foreach ($_POST['id'] as $id){
    if(isset($_POST['uye_onayla'])){
    if(empty($id) || $id == 1){
        echo '<div class="uyarilar">
             <div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>İşlem yapabilmek için lütfen seçim yapınız..</span></div></div>';
             header('Refresh: 3; url=index.php?islem=admin_yonetimi');

}else{
    $tamamlanan ="UPDATE kullanici SET status=1 WHERE id=$id ";
    $tamamlanan=$DB->get_row($tamamlanan);
    if($tamamlanan == 0){
	echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Seçilen Adminler onaylandı..</span></div></div>';
	header('Refresh: 2; url=index.php?islem=admin_yonetimi');

}
}
}

if(isset($_POST['uye_onaykaldir'])){
if(empty($id) || $id == 0){
}else{
    $devameden = "UPDATE kullanici SET status=2 WHERE id=$id ";
    $devameden=$DB->get_row($devameden);
    if($devameden == 0){
	echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Seçilen Adminlerin onayı kaldırıldı..</span></div></div>';
	header('Refresh: 2; url=index.php?islem=admin_yonetimi');

}
}
}
if(isset($_POST['uye_sil'])){
if(empty($id) || $id == 0){
}else{
    $delete ="DELETE FROM kullanici WHERE id=$id";
    $delete=$DB->query($delete);
    if($delete == 1){
        echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Seçilen Adminler silinmistir..</span></div></div>';
                    header('Refresh: 2; url=index.php?islem=admin_yonetimi');

}
}
}
}
?>
<br>
<h3 class="anabaslik">Adminler</h3>
<form action="" method="post">
<div class="tablo" style="width:100%">

<li class="no"><b><input name="" onclick="checkUncheckAll(this);" type="checkbox" value=""></b></li>
<li class="no"><b>No</b></li>
<li class="durum"><b>Durum</b></li>
<li class="baslikHizmet"><b>E-mail</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>


<div class="tablo2" style="width:100%">
<?php

$sql="SELECT * FROM kullanici ";
$kullanici=$DB->get_results($sql);
foreach ($kullanici as $kayitlar){
?> 
 
<div class="satir">
   
<li class="no"><input type="checkbox" name="id[]" value="<?php echo $kayitlar->id; ?>"></li>
<li class="no"><?php echo $kayitlar->id; ?></li>
<li class="durum">
    <?php if(($kayitlar->status) == 1){ ?><img class="durums" width="16" src="resources/css/images/icon/active.png"><?php } ?>
    <?php if(($kayitlar->status) == 2){ ?><img class="durums" width="16" src="resources/css/images/icon/bekleme.png"><?php } ?>
</li>
<li class="baslikHizmet"><?php echo $kayitlar->email; ?></li>

<li class="islem">
</li><li class="edit"><a href="index.php?islem=admin_guncelle&id=<?php echo $kayitlar->id;?>" class="button icon edit">Güncelle</a></li>

<div class="temizle"></div>
</div>
<?php } ?>   
 


<input style="margin-right:-14px;" class="button" type="reset" value="Temizle">
<input class="button danger" type="submit" value="Onayla" name="uye_onayla">
<input class="button danger" type="submit" value="Onayı Kaldır" name="uye_onaykaldir">
<input class="button danger" type="submit" value="Sil" name="uye_sil">
<div class="sayfala">
 </div>
 </div>
 </form>