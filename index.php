<?php require_once 'config.php'; ?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="stylesheet" type="text/css" href="resources/css/style.css" media="screen" />
	<title>My Ticket System</title>
</head>
<body>
<div id="site-wrapper">
	<div id="header">
		<?php include_once "inc/ust.php"; ?>
	</div>

	<div class="main" id="main-two-columns">
	  <div class="left" id="main-content" style="width: 73%;">     
	    <div id="comments">
	      <div class="post-title">
	      		<h3 class="section-title">KONULAR VE YORUMLAR</h3>
	      </div>
	      <div class="comment-list-wrapper">
	        <ul class="comment-list">
                    
<!-- ******************-->                    
<?php
$soru_sql="SELECT ud.id_kullanici, ud.ad, ud.soyad, s.id_soru, s.soru, s.tarih, c.id_soru, c.cevap, c.tarih FROM soru s INNER JOIN cevap c ON s.id_soru = c.id_soru LEFT JOIN uye_detay ud ON ud.id_kullanici = s.id_soru ";
$sonuclar=$DB->get_results($soru_sql);
foreach ($sonuclar as $soru){
?>
	          <li class="comment comment-parent" id="comment-47">
	            <div class="comment-profile-wrapper left">
	              <div class="comment-profile">
	                <div class="comment-gravatar"><img src="resources/css/images/sample-gravatar.gif" height="50" width="50" alt="" /></div>
	                <div class="comment-author"><?php echo $soru->ad.' '.$soru->soyad; ?></div>
                  </div>
                </div>
	            <div class="comment-content-wrapper right">
	              <div class="comment-content-wrapper-2">
	                <div class="comment-body">
	                  <div class="comment-arrow"></div>
	                  <div class="post-date">
	                    <div class="left">26.12.2013 - 22:58 | Üye </div>
	                    <div class="clearer">&nbsp;</div>
                      </div>
	                  <div class="comment-text"> <?php echo $soru->soru; ?> <span><a href="">[Devamı..]</a></span></div>
	                  <div class="clearer">&nbsp;</div>
                    </div>
                  </div>
                </div>
	            <div class="clearer">&nbsp;</div>
<?php } ?>
	            <ul class="children">
	              <li class="comment" id="comment-49">
	                <div class="comment-content">
	                  <div class="comment-body">
	                    <div class="post-date">
	                      <div class="left"><img src="resources/css/images/sample-gravatar.gif" height="28" width="28" alt="" /> 26.12.2013 - 23:05 | Yönetici </div>
	                      <div class="clearer">&nbsp;</div>
                        </div>
	                    <div class="comment-text"> qqqq<span><a href="">[Devamı..]</a></span></div>
                      </div>
                    </div>
                  </li>
                </ul>


  
                   <!--################--> 
              </li>
<!--*********************-->

            </ul>
          </div>

        <hr>

<!--
          	<div class="form">
				<section id="respond">
					<h3 class="section-title">Yarum Yap</h3>
					<form method="post" action="" class="comments-form" />
						<p class="input-block">
							<label for="name">Adınız <span>(*)</span></label><br>
							<input type="text" name="ad" id="name" />
						</p>

						<p class="input-block">
							<label for="name">Soyadınız <span>(*)</span></label><br>
							<input type="text" name="soyad" id="name" />
						</p>

						<p class="input-block">
							<label for="email">E-mail <span>(*)</span></label><br>
							<input type="text" name="email" id="email" />
						</p>

						<p class="input-block">
							<label for="kategori">Kategori</label><br>
							<select name="kategori">
								<option>Seçiniz</option>
								<option>Dilek</option>
								<option>Şikayet</option>
								<option>Teşekkür</option>
							</select>
						</p>

						<p class="input-block">
							<label for="comments">Mesaj: <span>(*)</span></label><br>
							<textarea name="comments" id="comments"></textarea>	
						</p>

						<p class="input-block">
							<button class="button orange" type="submit" id="submit">Gönder</button>
						</p>
						
					</form>
				</section>
			</div>
-->
        </div>       
      </div>
	  <div class="right sidebar" id="sidebar">
	  
	<?php include_once "kategoriler.php"; ?>

	</div>
		<div class="clearer">&nbsp;</div>
	</div>

	<?php include_once ('inc/footer.php'); ?>

</div>

</body>
</html>