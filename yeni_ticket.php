<!DOCTYPE>
<?php
include_once "config.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="stylesheet" type="text/css" href="resources/css/style.css" media="screen" />
	<title>My Ticket System/Yeni Ticket Oluştur</title> 
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <script language="javascript">
        function ChangeCode(){
            var NewSecurity= "<img src='security.php?rnd="+Math.random()+"' alt='guvenlik' style='border: 1px solid #999999;' />";
            $("#security").html(NewSecurity);
            return false;
        }
    </script>    
</head>

<body>

<div id="site-wrapper">
	<div id="header">
		<?php include_once "inc/ust.php"; ?>
	</div>

<div class="main" id="main-two-columns">
    <div class="left" id="main-content">
	  <div class="post-title">
	     <h3 class="section-title">TİCKET GİRİŞİ</h3>
	  </div>	  
<div class="form">
<section id="respond">
                                      
    <form method="post" action="yeni_ticket_gonder.php" class="comments-form" enctype="multipart/form-data"/>
    <p class="input-block">
    <label for="name">Adınız <span>(*)</span></label><br>
    <input type="text" name="ad" id="ad" />
    </p>

    <p class="input-block">
    <label for="name">Soyadınız <span>(*)</span></label><br>
    <input type="text" name="soyad" id="soyad" />
    </p>

        <p class="input-block">
            <label for="kategori">Kategori <span>(*)</span></label><br>
            <?php
            $sql2="SELECT * FROM kategori";
            $kategoriler=$DB->get_results($sql2);
            ?>
            <select name="id_kategori">
            <option value="">Seçiniz</option>
            <?php 
            foreach($kategoriler as $kategori){
            ?> 
            <option value="<?php echo $kategori->id_kategori;?>"><?php echo $kategori->kategori_ad; ?></option>
            <?php } ?>
            </select>
	</p>
    
        <p class="input-block">
            <label for="name">Başlık <span>(*)</span></label><br>
            <input type="text" name="baslik" id="baslik" />
	</p>

	<p class="input-block">
            <label for="email">E-mail <span>(*)</span></label><br>
            <input type="text" name="email" id="email" />
	</p>

    <p class="input-block">
        <label for="comments">Sorularınız: <span>(*)</span></label><br>
        <textarea name="soru" id="soru"></textarea>	
   </p>

    <p class="input-block">
        <label for="comments">Dosya: </label><br>
        <input type="file" name="dosya" value="" style="width:77%;">
    </p>
    
    <p class="input-block">
        
        <table>
        <tr>
            <td colspan="3" style="padding-left:5px;"><label for="comments">Güvenlik: <span>(*)</span></label></td>
        </tr>
        <tr>            
            <td></td>
            <td><div id="security"><img src="security.php" alt="guvenlik" style="border: 1px solid #999999;"></div></td>
            <td style="position: relative; bottom: 10px; padding:10px;"><a href="javascript:;" onclick="ChangeCode();"><img src="resources/images/refresh.png" /></a></td>
            <td style="position: relative; bottom: 15px;"><input type="text" name="security"/></td>
        </tr>           
        </table>
    </p>    
	<p class="input-block">
            <button class="button orange" type="submit" id="submit">Gönder</button>
	</p>
						
	</form><!--/ .contact-form-->	
    </section>
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