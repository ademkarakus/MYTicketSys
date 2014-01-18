<?php include_once "../config.php"; 
include_once "../kontroller.php";
$knt=new kontroller();

if($_POST){
    $kategori=$knt->kontrol($_POST['kategori']);
    
    $hatamesaj=array();
    
    if(empty($kategori)){
        $hatamesaj[]='Kategori Boş Bırakılamaz.';
    }
    if(strlen($kategori)>100){
        $hata[]='Kategori Adı 100 karakterden büyük olamaz';
    }    
    if(count($hatamesaj)>0){
         foreach($hatamesaj as $hatalar){
          echo $hatalar.'<br/>';
         }
    }else{
    $sql="INSERT INTO kategori(kategori_ad ) "
            . "VALUES ( '$kategori' ) ";
    $ekle=$DB->query($sql);
    if($ekle == true){
            echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Başari Ile Güncellendi</span></div></div>';
            header('Refresh: 3; url=index.php?islem=kategori_ekle');
        }else{
            echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Güncellenemedi problem oluştu.</span></div></div>';
            header('Refresh: 3; url=index.php?islem=kategori_ekle');
            echo $DB->last_error;
            exit;
}
}
}
?>
<h4 class="anabaslik">Kategori Ekle</h4>
<form method="post" action="" enctype="multipart/form-data">
<div class="div">
    <li class="sol_li">Kategori Girişi<span>:</span></li>
    <input type="text" class="input inp3 " name="kategori" id="" value="">
</div>
    
<input type="submit" class="button" value="Kaydet"> 
</form>    