<?php require_once 'config.php'; ?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>My Ticket System</title>

	<link rel="stylesheet" type="text/css" href="resources/css/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="resources/css/jquery.autocomplete.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/jquery.autocomplete.js"></script>
    <script type="text/javascript">
		$(function() {
			$("#act").autocomplete('search.php?output=json', {
				remoteDataType: 'json',
				maxItemsToShow: 10,
				autoFill: true,
				onItemSelect: function(item) {
					document.location.href=''+item.value;
				}
			});
		});
    </script>	
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
	        <ul class="comment-list" style="padding-right: 5px;">
                <li class="comment comment-parent" id="comment-47" style="padding-bottom: 15px;">    
<!-- ******************-->                    
<?php
$soru_sql="SELECT ud.id_kullanici, ud.ad, ud.soyad, s.baslik, s.soru, s.id_soru, s.tarih "
        . "FROM uye_detay ud "
        . "LEFT JOIN soru s "
        . "ON ud.id_kullanici = s.id_kullanici "
        . "ORDER BY ud.id_kullanici DESC LIMIT 10";
$sonuclar=$DB->get_results($soru_sql);
foreach ($sonuclar as $soru){
?>
	          
	            <div class="comment-profile-wrapper left" style="padding-top: 15px;">
	              <div class="comment-profile">
	                <div class="comment-gravatar"><img src="resources/css/images/sample-gravatar.gif" height="50" width="50" alt="" /></div>
	                <div class="comment-author"><?php echo ucwords($soru->ad.' '.$soru->soyad); ?></div>
                  </div>
                </div>
	            <div class="comment-content-wrapper right" style="padding-top: 15px;">
	              <div class="comment-content-wrapper-2">
	                <div class="comment-body">
	                  <div class="comment-arrow"></div>
	                  <div class="post-date">
	                    <div class="left"><?php echo $soru->tarih; ?> | Üye </div>
	                    <div class="clearer">&nbsp;</div>
                      </div>
	                  <div class="comment-text" style="margin-bottom: 12px;"> <?php echo $soru->soru; ?></div>
	                  <div class="clearer">&nbsp;</div>
                    </div>
                  </div>
                </div>
	            <div class="clearer">&nbsp;</div>
 <?php 
     $sql="SELECT * FROM cevap "
        . "WHERE id_soru=$soru->id_soru";
        $sonuc=$DB->get_results($sql);
        foreach ($sonuc as $cevap){
 ?>
                    <div class="clearer">&nbsp;</div>
                    <ul class="children" style="">
	              <li class="comment" id="comment-49">
	                <div class="comment-content">
	                  <div class="comment-body">
	                    <div class="post-date">
	                      <div class="left"><img src="resources/css/images/sample-gravatar.gif" height="28" width="28" alt="" /> <?php echo $cevap->tarih; ?> | Yönetici </div>
	                      <div class="clearer">&nbsp;</div>
                        </div>
	                    <div class="comment-text"><?php echo $cevap->cevap; ?></div>
                      </div>
                    </div>
                  </li>
                 </ul>
<?php } ?>
<?php } ?>
              </li>
            </ul>
          </div>
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