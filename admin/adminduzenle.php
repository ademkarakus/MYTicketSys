<?php include_once "../config.php"; ?>
<?php
$link ="index.php?islem=adminduzenle&id=$id";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;

if($islem=='adminduzenle'){
    $sql="SELECT * FROM kullanici WHERE id = $id";
    $kullanici=$DB->get_row($sql);
}

if($_POST){
    $kullaniciad= trim($_POST['kullaniciad']);
    $email=trim($_POST['email']);
    $password=sha1($_GET['sifre']);
    $rol= $_POST['onay'];
    
    $sql2="UPDATE kullanici "
            . "SET kullaniciad='$kullaniciad',  email='$email',  password='$password', status=$rol "
            . "WHERE id=$id";
    $guncelle=$DB->get_row($sql2);
    if($guncelle == 0){
        echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Admin Başari Ile Güncellendi</span></div></div>';
        header('Refresh: 3; url='.$link.'');
    }else{
        echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Admin güncellenemedi lütfen tekrar deneyin</span></div></div>';
        header('Refresh: 3; url='.$link.'');
        exit;
    }
}
?>
<h4>Admin Bilgilerini Düzenle</h4>

<form method="post">
<div class="div"><li class="sol_li">Kullanıcı Adı <span>:</span></li><input type="text" class="input inp3 " name="kullaniciad" value="<?php echo $kullanici->kullaniciad; ?>"></div>
<div class="div"><li class="sol_li">Email <span>:</span></li><input type="text" class="input inp3 " name="email" value="<?php echo $kullanici->email; ?>"></div>

<div class="div"><li class="sol_li">Sifre <span>:</span></li><input type="password" class="input inp3 " name="sifre" value=""></div>
<div class="div"><li class="sol_li">Onay <span>:</span></li><select  class="input inp2" name="onay">
									
										<option value="2" <?php if($kullanici->status == 0){echo 'selected';}?>>Onaylı Değil</option>
										<option value="1" <?php if($kullanici->status == 1){echo 'selected';}?>>Onaylı</option>
										
									</select></div>

<input value="<?php echo $_GET['id']; ?>" name="uyeid"  type="hidden" />
<input type="submit" class="button" value="Kaydet"/>
</form>
