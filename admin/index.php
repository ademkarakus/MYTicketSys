<?php require("login/session.php"); ?>
<?php require("cikis.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Yönetim Paneli</title>
		<link href="resources/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
		<link href="resources/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="resources/css/dataTables_themeroller.css">

		<script type="text/javascript" src="resources/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="resources/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="lib/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="resources/js/dataTables.min.js"></script>
		<script type="text/javascript" src="resources/js/js.js"></script>
</head>
<body>
<div class="enust">
<?php
include_once 'menu.php';
?>
<div class="yanyana" style="width:1120px;">
	<?php
        $sayfalar=array("", "admin_guncelle", "admin_yonetimi", "admin_ekle", "kategori_duzenle", "kategori_guncelle", "kategori_ekle", "ticket_duzenle", "ticket_guncelle", "ticket_cevapla", "ticket_cevapla", "ticket_cevap_yaz", "cevap_duzenle",   "cevap_yaz", "cevaplananlar", "cikis" );  
        $islem = $_GET['islem'];
        if (in_array($islem, $sayfalar)){
            if(file_exists("{$islem}.php"))
                require("{$islem}.php");
                if($islem == ""){
                    echo '<h2><center>Hoşgeldiniz</center></h2>';
                }
	    }else{
                require("hata.php");   
            }
	?>
</div>
</div>
<div class="temizle"></div>
<?php include_once 'footer.php'; ?>
</body>
</html>