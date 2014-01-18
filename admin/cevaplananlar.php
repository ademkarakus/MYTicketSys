<?php include_once "../config.php"; ?>
<h3 class="anabaslik" style="width:100%">Cevaplanmış Ticketlar</h3>
<input type="hidden" name="tablo" id="tablo" value="cevaplar">
<table class="dataTable">

    <thead>
		<tr>
			<th>GNC</th>
                        <th>AD</th>
                        <th>SOYAD</th>
			<th>SORU</th>
                        <th>CEVAP BASLIK</th>
			<th>CEVAP</th>
			<th>TARİH</th>
		 </tr>
	</thead>

    <tbody>
<?php
	$sql="SELECT ud.ad,ud.soyad, s.id_soru, c.baslik, s.soru, c.id_cevap, c.id_soru, c.cevap, c.tarih "
                . "FROM uye_detay ud "
                . "INNER JOIN soru s "
                . "ON ud.id_kullanici=s.id_soru "
                . "INNER JOIN cevap c "
                . "ON s.id_soru = c.id_soru "
                . "WHERE STATUS=2 "
                . "ORDER BY c.id_cevap DESC";
	$sonuclar=$DB->get_results($sql);
	foreach($sonuclar as $kayitlar){

?>
        <tr>
			<td class="center"><a href="index.php?islem=cevap_duzenle&id=<?php echo $kayitlar->id_cevap; ?>"><button class="gncll" value="Güncelle">Güncelle</button></a></td>
			<td class="center"><?php echo $kayitlar->ad;  ?></td>
                        <td class="center"><?php echo $kayitlar->soyad;  ?></td>
			<td class="center"><?php echo $kayitlar->soru;  ?></td>
                        <td class="center"><?php echo $kayitlar->baslik;  ?></td>
			<td class="center"><?php echo $kayitlar->cevap;  ?></td>
			<td class="center"><?php echo $kayitlar->tarih;  ?></td>
		</tr>
<?php } ?>    

    </tbody>

</table>