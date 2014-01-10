<?php require_once 'config.php'; ?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>My Ticket System/Yeni Ticket Oluştur</title>
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
    <div class="left" id="main-content">
        <div class="post-title">
            <h3 class="section-title">ESKİ TİCKET UYGULAMALARI</h3>
        </div>	  
       <div class="form">
        <section id="respond">
            <table border="1" style="width: 650px">
                <thead>
                    <tr>
                        <th>AD-SOYAD</th>
                        <th>KATEGORİ</th>
                        <th>BAŞLIK</th>
                        <th>TARİH</th>
                    </tr>
                </thead>
<?php
$sql="SELECT ud.id_kullanici, ud.ad, ud.soyad, ud.email, k.kategori_ad, s.baslik, s.tarih "
        . "FROM uye_detay ud "
        . "LEFT JOIN soru s "
        . "ON s.id_kullanici = ud.id_kullanici "
        . "LEFT JOIN kategori k "
        . "ON k.id_kategori = ud.id_kategori";

$sonuclar=$DB->get_results($sql);
//$a=0;
if(count($sonuclar) == 0){
        echo '<tr><td colspan="7"><font color=red><center>Hiç Mesaj Yok</center></font></td></tr>';
}else{
    foreach ($sonuclar as $kayitlar){
        echo '<tr>
         <td>'.ucwords($kayitlar->ad.' '.$kayitlar->soyad).'</td> 
         <td>'.$kayitlar->kategori_ad.'</td>
         <td>'.$kayitlar->baslik.'</td>
         <td>'.$kayitlar->tarih.'</td>    
        
         </tr>';
    }
}
?>
            </table>
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