<?php include_once "../config.php"; 
$link ="index.php?islem=soru_cevapla&id=$id";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;
if($_POST){
    $baslik=$_POST['baslik'];
    $cevap=$_POST['cevap'];
    $dosya=$_POST['dosya'];
    $tarih=date('Y-m-d H:i:s');
    
    $sql="INSERT INTO cevap(id_soru, baslik, cevap, dosya, tarih ) "
            . "VALUES ($id, '$baslik', '$cevap', '$dosya', '$tarih' )";
    $kaydet=$DB->query($sql);
        if($kaydet == 1){
            echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Başari Ile Güncellendi</span></div></div>';
            header('Refresh: 15; url='.$link.'');
        }else{
            echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Güncellenemedi problem oluştu.</span></div></div>';
            header('Refresh: 15; url='.$link.'');
            echo $DB->last_error;
            exit;
}  
  
}	
?>
<h4 class="anabaslik">Ticket Cevapla <?php echo $id; ?></h4>

<form method="post" action="" enctype="multipart/form-data">
 
<div class="div">
	<li class="sol_li">Başlık<span>:</span></li>
	<input type="text" class="input inp3 " name="baslik" id="baslik" value="">
</div>


<div class="div">
	<li class="sol_li">cevap<span>:</span></li><br>
	<br>
	<div>
		<textarea class="ckeditor " name="cevap"></textarea>
	</div>
</div>

 <div class="div">
        <li class="sol_li">Dosya<span>:</span></li>
        <input type="file" name="dosya" value=""/>
 </div>

<input value="<?php echo $_GET['id']; ?>" name="id"  type="hidden" />
<input type="submit" class="button" value="Kaydet"> 
</form>
