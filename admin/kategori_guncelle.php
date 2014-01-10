<?php include_once "../config.php"; ?>
<?php
$link ="index.php?islem=kategori_duzenle";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;

if($islem=='kategori_guncelle'){
    $sql="SELECT * FROM kategori WHERE id_kategori = $id";
    $kullanici=$DB->get_row($sql);
}

if($_POST){
    $kategori= trim($_POST['kategori']);
    
    $sql2="UPDATE kategori "
            . "SET kategori_ad='$kategori' "
            . "WHERE id_kategori=$id";
    $guncelle=$DB->get_row($sql2);
    if($guncelle == 0){
        echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Kategori Güncellendi</span></div></div>';
        header('Refresh: 3; url='.$link.'');
    }else{
        echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Kategori güncellenemedi lütfen tekrar deneyin</span></div></div>';
        header('Refresh: 3; url='.$link.'');
        exit;
    }
}
?>
<h4>Kategori Düzenle</h4>

<form method="post">
<div class="div"><li class="sol_li">Kategori <span>:</span></li><input type="text" class="input inp3 " name="kategori" value="<?php echo $kullanici->kategori_ad; ?>"></div>

<input value="<?php echo $_GET['id']; ?>" name="uyeid"  type="hidden" />
<input type="submit" class="button" value="Kaydet"/>
</form>

