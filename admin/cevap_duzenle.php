<?php include_once "../config.php";
include_once "../kontroller.php";
$knt=new kontroller();

$link ="index.php?islem=cevap_duzenle&id=$id";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;

if($islem =='cevap_duzenle'){
    $sql="SELECT * FROM cevap WHERE id_cevap = $id";
    $kullanici=$DB->get_row($sql);
}

if($_POST){
    $baslik=$knt->kontrol($_POST['baslik']);
    $cevap=$knt->kontrol($_POST['cevap']);
    $dosya=$_POST['dosya'];
    $tarih=date('Y-m-d H:i:s');
    
    $sql2="UPDATE cevap "
            . "SET id_soru='$id',  baslik='$baslik',  cevap='$cevap', tarih='$tarih', dosya=$dosya "
            . "WHERE id_cevap=$id";
    $guncelle=$DB->get_row($sql2);
        if($guncelle == 1){
            echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Başari Ile Güncellendi</span></div></div>';
            header('Refresh: 3; url='.$link.'');
        }else{
            echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Güncellenemedi problem oluştu.</span></div></div>';
            header('Refresh: 3; url='.$link.'');
            echo $DB->last_error;
            exit;
}  
  
}	
?>
<h4 class="anabaslik">Ticket Cevapla <?php echo $kullanici->id_soru; ?></h4>

<form method="post" action="" enctype="multipart/form-data">
 
<div class="div">
	<li class="sol_li">Başlık<span>:</span></li>
	<input type="text" class="input inp3 " name="baslik" id="baslik" value="<?php echo $kullanici->baslik; ?>">
</div>


<div class="div">
	<li class="sol_li">cevap<span>:</span></li><br>
	<br>
	<div>
		<textarea class="ckeditor " name="cevap"><?php echo $kullanici->cevap; ?></textarea>
	</div>
</div>

 <div class="div">
        <li class="sol_li">Dosya<span>:</span></li>
        <input type="file" name="dosya" value="<?php echo $kullanici->dosya; ?>"/>
 </div>

<input value="<?php echo $_GET['id']; ?>" name="id"  type="hidden" />
<input type="submit" class="button" value="Kaydet"> 
</form>
