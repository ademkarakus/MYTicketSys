<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Login</title>
<link rel="stylesheet" type="text/css" href="../resources/css/giris.css">
</head>
<body>
    <div style="color:red; border: 1px solid #ccc">
        <?php
        if( isset( $_SESSION['hataMesaj'] ) ){
            foreach ($_SESSION['hataMesaj'] as $hata){
                echo $hata;
                echo '<br />';
            }
            unset($_SESSION['hataMesaj']);
        }
        ?>
    </div>
<section class="container">
    <div class="login">
      <h1>Admin Paneline Giriş</h1>
      <form method="post" action="login.php">
        <p><input type="text" name="email" value="" placeholder="Email Adresiniz"></p>
        <p><input type="password" name="parola" value="" placeholder="Şifreniz"></p>
      
        <p class="submit"><input type="submit" name="commit" value="Giriş Yap"></p>
      </form>
    </div>

 
  </section>

  <section class="about">
    
    <p class="about-author">
      &copy; 2014 <a href="http://wwww.karakusadem.com" target="_blank">karakusadem</a>
    
  </section>
</body>
</html>