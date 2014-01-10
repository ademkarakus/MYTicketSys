<?php include_once "../config.php"; 
include_once "../kontroller.php";
$knt=new kontroller();

$link ="index.php?islem=admin_guncelle&id=$id";
$islem=$_GET['islem'];
$id =$_GET['id'];
$id=(int)$id;

if($islem=='admin_guncelle'){
    $sql="SELECT * FROM kullanici WHERE id = $id";
    $kullanici=$DB->get_row($sql);
}

if($_POST){
    $kullaniciad= $knt->kontrol($_POST['kullaniciad']);
    $email=$knt->kontrol($_POST['email']);
    $password=$knt->kontrol($_POST['sifre']);
    $password=$knt->sifrele($password);
    $rol= $_POST['onay'];
    
    $hatamesaj=array();
    
    if(empty($kullaniciad)){
        $hatamesaj[]='Ad Boş Bırakılamaz.';
    }
    if(strlen($kullaniciad)>25){
        $hata[]='Kullanici Adı karakterden büyük olamaz';
    }
    if(empty($email)){
        $hatamesaj[]='Email Boş Bırakılamaz.';
    }
    if(strlen($email)>100){
        $hatamesaj[]='E-mail 100 karakterden büyük olmaz';
    }
    if(empty($password)){
        $hatamesaj[]='Şifre Boş bırakılamz.';
    }
    
          if(count($hatamesaj)>0){
            foreach($hatamesaj as $hatalar){
                echo $hatalar.'<br/>';
                }
          }else{
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
}
?>
<h4>Admin Bilgilerini Güncelle</h4>

<form method="post">
<div class="div"><li class="sol_li">Kullanıcı Adı <span>:</span></li><input type="text" class="input inp3 " name="kullaniciad" value="<?php echo $kullanici->kullaniciad; ?>"></div>
<div class="div"><li class="sol_li">Email <span>:</span></li><input type="text" class="input inp3 " name="email" value="<?php echo $kullanici->email; ?>"></div>

<div class="div"><li class="sol_li">Sifre <span>:</span></li><input type="password" class="input inp3 " name="sifre" value=""></div>
<div class="div"><li class="sol_li">Onay <span>:</span></li><select  class="input inp2" name="onay">
									
                                        <option value="1" <?php if($kullanici->status == 1){echo 'selected';}?>>Onaylı</option>
										<option value="2" <?php if($kullanici->status == 2){echo 'selected';}?>>Onaylı Değil</option>
										
									</select></div>

<input value="<?php echo $_GET['id']; ?>" name="uyeid"  type="hidden" />
<input type="submit" class="button" value="Kaydet"/>
</form>
