<?php
include_once "../config.php";
if($_POST){
    $kullaniciad=$_POST['kullaniciad'];
    $email=$_POST['email'];
    $password=  sha1($_POST['sifre']);
    $rol=$_POST['onay'];
    
    $hata=false;
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
}
?>

<div class="yanyana" style="width:1120px;">
<div id="kategoriekle"><a href="index.php?islem=adminyonetimi">Admin Yönetimi</a></div>
<h4>Admin Bilgilerini Düzenle</h4>

<?php
      if(count($hatamesaj)>0){
          foreach($hatamesaj as $hata){
           echo $hata.'<br/>';
          }
      }else{
          $sql="INSERT INTO kullanici (kullaniciad, email, password, id_kullanici_rol, status) "
               . "VALUES ('$kullaniciad','$email', '$password', $rol, 1)";
          $sonuc=$DB->query($sql);
          if($sonuc == 1){
            echo '<div class="uyarilar"><div class="uyar basarili"><img src="resources/css/images/icon/basarili.png"><span>Admin Başari İle Eklendi</span></div></div>';
            header('Refresh: 3; url=index.php?islem=adminyonetimi');
          }
      }
      ?>

<form method="post">
<div class="div"><li class="sol_li">Kullanıcı Adı <span>:</span></li><input type="text" class="input inp3 " name="kullaniciad" ></div>
<div class="div"><li class="sol_li">Email <span>:</span></li><input type="text" class="input inp3 " name="email" value=""></div>

<div class="div"><li class="sol_li">Sifre <span>:</span></li><input type="password" class="input inp3 " name="sifre" value=""></div>
<div class="div"><li class="sol_li">Onay <span>:</span></li>
    
<select  class="input inp2" name="onay">

        
        <option value="1" selected>Onaylı</option>
        <option value="2" >Onaylı Değil</option>

</select></div>

<input type="submit" class="button" value="Kaydet"> 
</form>

