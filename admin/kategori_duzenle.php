<?php include_once "../config.php"; ?>
<h3 class="anabaslik" style="width:100%">Yeni Ticket</h3>
<input type="hidden" name="tablo" id="tablo" value="kategori_duzenle">
<table class="dataTable">

    <thead>
        <tr>
                <th>GÜNCELLE</th>
                <th>NO</th>
                <th>KATEGORİ</th>
                <th>SİL</th>
        </tr>
    </thead>

    <tbody>
<?php

    $sql="SELECT * FROM kategori";
    $sonuclar=$DB->get_results($sql);
    foreach ($sonuclar as $kayitlar){
   

?>
        <tr>
            <td class="center"><a href="index.php?islem=kategori_guncelle&id=<?php echo $kayitlar->id_kategori; ?>"><button class="gncll" value="C">Güncelle</button></a></td>
            <td class="center"><?php echo $kayitlar->id_kategori; ?></td>
            <td class="center"><?php echo $kayitlar->kategori_ad; ?></td>            
            <td class="center"><?php echo '<a onclick="return confirm(\'Mesaj Silinecek!\');" href="index.php?islem=kategori_duzenle&id='.$kayitlar->id_kategori.'"><center><button class="sil"   value="">Sil</button></center></a>'?></td>
        </tr>        
 <?php  
 }
$islem=$_GET['islem'];
$id=$_GET['id'];
$id=(int)$id;
    if($islem == 'kategori_duzenle'){
        
        $sql3="DELETE FROM kategori WHERE id_kategori = $id";
        $sil=$DB->query($sql3);
        
        if($sil==true){
            header('Refresh: 1; url=index.php?islem=kategori_duzenle');
            exit;
        }
    }
    ?>
    </tbody>
</table>