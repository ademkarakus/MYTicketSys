<?php include_once "../config.php"; ?>
<h3 class="anabaslik" style="width:100%">Yeni Ticket</h3>
<input type="hidden" name="tablo" id="tablo" value="yeniticket">
<table class="dataTable">

    <thead>
        <tr>
                <th>CEVAPLA</th>
                <th>AD-SOYAD</th>
                <th>KATEGORİ</th>
                <th>BAŞLIK</th>
                <th>SORU</th>
                <th>TARİH</th>
                <th>DOSYA</th>
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
        . "ORDER BY ud.id_kullanici DESC";
    $sonuclar=$DB->get_results($sql);
    foreach ($sonuclar as $kayitlar){
   

?>
        <tr>
            <td class="center"><a href="index.php?islem=ticket_cevap_yaz&id=<?php echo $kayitlar->id_kullanici; ?>"><button class="gncll" value="C">Cevap Yaz</button></a></td>
            <td class="center"><?php echo $kayitlar->ad.' '.$kayitlar->soyad; ?></td>
            <td class="center"><?php echo $kayitlar->kategori_ad; ?></td>
            <td class="center"><?php echo $kayitlar->baslik; ?></td>
            <td class="center"><?php echo $kayitlar->soru; ?></td>
            <td class="center"><?php echo $kayitlar->tarih; ?></td>
            <td class="center"><?php echo $kayitlar->dosya; ?></td>
        </tr>        
 <?php } ?>
    </tbody>
</table>