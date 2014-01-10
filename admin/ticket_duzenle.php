<?php include_once "../config.php"; ?>
<h3 class="anabaslik" style="width:100%">Ticket Düzenle</h3>
<input type="hidden" name="tablo" id="tablo" value="yeniticket">
<table class="dataTable">

    <thead>
        <tr>
                <th>GÜNCELLE</th>
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
        . "LEFT JOIN soru s "
        . "ON ud.id_kullanici = s.id_kullanici "
        . "LEFT JOIN kategori k "
        . "ON k.id_kategori = ud.id_kategori "
        . "WHERE status=1 "
        . "ORDER BY ud.id_kullanici DESC ";
    $sonuclar=$DB->get_results($sql);
    foreach ($sonuclar as $kayitlar){
   

?>
        <tr>
            <td class="center"><a href="index.php?islem=ticket_guncelle&id=<?php echo $kayitlar->id_kullanici; ?>"><button class="gncll" value="C">Güncelle</button></a></td>
            <td class="center"><?php echo $kayitlar->ad.' '.$kayitlar->soyad; ?></td>
            <td class="center"><?php echo $kayitlar->kategori_ad; ?></td>
            <td class="center"><?php echo $kayitlar->baslik; ?></td>
            <td class="center"><?php echo $kayitlar->soru; ?></td>
            <td class="center"><?php echo $kayitlar->tarih; ?></td>
            <td class="center"><?php echo $kayitlar->dosya; ?></td>
            
            <td class="center"><?php echo '<a onclick="return confirm(\'Mesaj Silinecek!\');" href="index.php?islem=ticket_duzenle&id='.$kayitlar->id_kullanici.'"><center><button class="sil"   value="">Sil</button></center></a>'?></td>
        </tr>        
 <?php  
 }
$islem=$_GET['islem'];
$id=$_GET['id'];
$id=(int)$id;
    if($islem == 'ticket_duzenle'){
        
        $sql3="DELETE FROM uye_detay WHERE id_kullanici = $id";
        $sil=$DB->query($sql3);
        
        if($sil==true){
            unlink('../dosya/'. $dosyaAd);
            header('Refresh: 1; url=index.php?islem=ticket_duzenle');
            exit;
        }
    }
    ?>
    </tbody>
</table>