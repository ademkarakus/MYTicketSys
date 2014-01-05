<?php include_once "../config.php"; ?>
<h3 class="anabaslik" style="width:100%">Cevaplanmış Ticketlar</h3>
<input type="hidden" name="tablo" id="tablo" value="cevaplar">
<table class="dataTable">

    <thead>
		<tr>
			<th>GNC</th>
			<th>BASLIK</th>
			<th>SORU</th>
			<th>CEVAP</th>
			<th>TARİH</th>
		 </tr>
	</thead>

    <tbody>
<?php
	$sql="SELECT s.id_soru, c.baslik, s.soru, c.id_cevap, c.id_soru, c.cevap, c.tarih FROM soru s INNER JOIN cevap c ON s.id_soru = c.id_soru";
	$sonuclar=$DB->get_results($sql);
	foreach($sonuclar as $kayitlar){

?>
        <tr>
			<td class="center"><a href="index.php?islem=cevap_duzenle&id=<?php echo $kayitlar->id_cevap; ?>"><button class="gncll" value="Güncelle">Güncelle</button></a></td>
			<td class="center"><?php echo $kayitlar->baslik;  ?></td>
			<td class="center"><?php echo $kayitlar->soru;  ?></td>
			<td class="center"><?php echo $kayitlar->cevap;  ?></td>
			<td class="center"><?php echo $kayitlar->tarih;  ?></td>
		</tr>
<?php } ?>    

    </tbody>

</table>