<?php include_once "../config.php"; ?>
<h3 class="anabaslik" style="width:100%">Yeni Ticket</h3>
<input type="hidden" name="tablo" id="tablo" value="yeniticket">
<table class="dataTable">

    <thead>
        <tr>
                <th>GNC</th>
                <th>AD-SOYAD</th>
                <th>KATEGORİ</th>
                <th>BAŞLIK</th>
                <th>SORU</th>
                <th>TARİH</th>
                <th>DOSYA</th>
                <th>SİL</th>
        </tr>
    </thead>

    <tbody>
<?php

    $sql="SELECT ud.id_kullanici, ud.ad, ud.soyad, k.kategori_ad, s.baslik, s.soru, s.tarih, s.dosya, ud.status "
        . "FROM uye_detay ud "
        . "LEFT JOIN kategori k "
        . "ON ud.id_kullanici=k.id_kategori LEFT JOIN soru s "
        . "ON s.id_kullanici=ud.id_kullanici "
        . "WHERE status=1 ";
    $sonuclar=$DB->get_results($sql);
    foreach ($sonuclar as $kayitlar){
   

?>
        <tr>
            <td class="center"><a href="index.php?islem=soru_cevapla&id=<?php echo $kayitlar->id_kullanici; ?>"><button class="gncll" value="C">Güncelle</button></a></td>
            <td class="center"><?php echo $kayitlar->ad.' '.$kayitlar->soyad; ?></td>
            <td class="center"><?php echo $kayitlar->kategori_ad; ?></td>
            <td class="center"><?php echo $kayitlar->baslik; ?></td>
            <td class="center"><?php echo $kayitlar->soru; ?></td>
            <td class="center"><?php echo $kayitlar->tarih; ?></td>
            <td class="center"><?php echo $kayitlar->dosya; ?></td>
            
            <td class="center"><?php echo '<a onclick="return confirm(\'Mesaj Silinecek!\');" href="index.php?islem=yeni_ticket&id='.$kayitlar->id_kullanici.'"><center><button class="sil"   value="">Sil</button></center></a>'?></td>
        </tr>        
 <?php  
 }
$islem=$_GET['islem'];
$id=$_GET['id'];
$id=(int)$id;
    if($islem == 'yeni_ticket'){
        $sql2="SELECT dosya FROM soru WHERE id_kullanici = $id;";
        $dosyaAd = $DB->get_var($sql2);
        
        $sql3="DELETE FROM uye_detay WHERE id_kullanici = $id";
        $sil=$DB->query($sql3);
        
        if($sil==1){
            unlink('../dosya/'. $dosyaAd);
            header('Refresh: 1; url=index.php?islem=yeni_ticket');
            exit;
        }
    }
    ?>
    </tbody>
</table>