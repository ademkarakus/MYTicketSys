<?php include_once 'kontroller.php'; 
$metin=new kontroller();
?>

<div class="section">
    <div class="section-title">DİLEK VE İSTEK MESAJLARI</div>

    <div class="section-content">

            <ul class="nice-list">
                <?php
                $sql1="SELECT ud.id_kullanici, k.id_kategori, k.kategori_ad, s.baslik "
                        . "FROM uye_detay ud "
                        . "INNER JOIN soru s "
                        . "ON ud.id_kullanici = s.id_kullanici "
                        . "INNER JOIN kategori k "
                        . "ON ud.id_kategori = k.id_kategori "
                        . "WHERE k.id_kategori=1 "
                        . "ORDER BY s.id_kullanici DESC LIMIT 6";
                //$sql1="SELECT ud.id_kullanici, k.id_kategori, k.kategori_ad, s.baslik FROM uye_detay ud INNER JOIN soru s ON s.id_kullanici = ud.id_kullanici INNER JOIN kategori k ON k.id_kategori = ud.id_kullanici WHERE k.id_kategori=1 LIMIT 6 ";
                $sonuclar=$DB->get_results($sql1);
                foreach ($sonuclar as $kategori){
                    echo '
                    <li>
                            <div class="left"><a href="detay.php?islem=detay&id='.$kategori->id_kullanici.'">'.$metin->metin($kategori->baslik).'</a></div>
                            <div class="right"></div>
                            <div class="clearer">&nbsp;</div>
                    </li>';                
                }
                ?>
            </ul>

    </div>

</div>

<div class="section">

    <div class="section-title">ŞİKAYET MESAJLARI</div>

    <div class="section-content">

            <ul class="nice-list">
                <?php                
                $sql2="SELECT ud.id_kullanici, k.id_kategori, k.kategori_ad, s.baslik "
                        . "FROM uye_detay ud "
                        . "INNER JOIN soru s "
                        . "ON ud.id_kullanici = s.id_kullanici "
                        . "INNER JOIN kategori k "
                        . "ON ud.id_kategori = k.id_kategori "
                        . "WHERE k.id_kategori=2 "
                        . "ORDER BY s.id_kullanici desc LIMIT 6";
                $sonuclar=$DB->get_results($sql2);
                foreach ($sonuclar as $kategori){
                    echo '
                    <li>
                            <div class="left"><a href="detay.php?islem=detay&id='.$kategori->id_kullanici.'">'.$metin->metin($kategori->baslik).'</a></div>
                            <div class="right"></div>
                            <div class="clearer">&nbsp;</div>
                    </li>';                

                }
                ?>
            </ul>

    </div>

</div>

<div class="section">
    <div class="section-title">TEŞEKKÜR MESAJLARI</div>
    <div class="section-content">
            <ul class="nice-list">
                <?php
                $sql3="SELECT ud.id_kullanici, k.id_kategori, k.kategori_ad, s.baslik "
                        . "FROM uye_detay ud "
                        . "INNER JOIN soru s "
                        . "ON ud.id_kullanici = s.id_kullanici "
                        . "INNER JOIN kategori k "
                        . "ON ud.id_kategori = k.id_kategori "
                        . "WHERE k.id_kategori=3 "
                        . "ORDER BY s.id_kullanici desc LIMIT 6";
                $sonuclar=$DB->get_results($sql3);
                foreach ($sonuclar as $kategori){
                    echo '
                    <li>
                            <div class="left"><a href="detay.php?islem=detay&id='.$kategori->id_kullanici.'">'.$metin->metin($kategori->baslik).'</a></div>
                            <div class="right"></div>
                            <div class="clearer">&nbsp;</div>
                    </li>';                

                }
                ?>
            </ul>

    </div>
			
</div>