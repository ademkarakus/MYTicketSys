<?php
include_once "../config.php";
include_once "../kontroller.php";
$knt=new kontroller();
if($_POST){
    $kullaniciad=$knt->kontrol($_POST['kullaniciad']);
    $email=$knt->kontrol($_POST['email']);
    $password=$knt->kontrol($_POST['sifre']);
    $password=$knt->sifrele($password);
    $rol=$_POST['onay'];
    
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
          $sql="INSERT INTO kullanici (kullaniciad, email, password, status) "
               . "VALUES ('$kullaniciad','$email', '$password', 1)";
          $sonuc=$DB->query($sql);
          if($sonuc == true){
            echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Admin Başari İle Eklendi</span></div></div>';
            header('Refresh: 3; url=index.php?islem=admin_yonetimi');
          }else{
            echo '<div class="uyarilar"><div class="uyar error"><img src="resources/css/images/icon/errors.png"><span>Admin güncellenemedi lütfen tekrar deneyin</span></div></div>';
            header('Refresh: 3; url=index.php?islem=admin_yonetimi');
          }
      }
  }
?>
<div class="yanyana" style="width:1120px;">
<h3 class="anabaslik">Admin Ekle</h3>
<form method="post" action="">
<div class="div"><li class="sol_li">Kullanıcı Adı <span>:</span></li><input type="text" class="input inp3 " name="kullaniciad" /></div>
<div class="div"><li class="sol_li">Email <span>:</span></li><input type="text" class="input inp3 " name="email" value="" /></div>

<div class="div"><li class="sol_li">Sifre <span>:</span></li><input type="password" class="input inp3 " name="sifre" value="" /></div>

<div class="div"><li class="sol_li">Onay <span>:</span></li>
<select  class="input inp2" name="onay">
        <option value="1" selected>Onaylı</option>
        <option value="2" >Onaylı Değil</option>
</select>
</div>
<input type="submit" class="button" value="Kaydet" /> 
</form>