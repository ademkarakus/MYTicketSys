<div class="section">
    <div class="section-title">DİLEK VE İSTEK MESAJLARI</div>

    <div class="section-content">

            <ul class="nice-list">
                <?php
                $sql1="SELECT ud.id_kullanici, k.id_kategori, k.kategori_ad, s.baslik FROM uye_detay ud INNER JOIN soru s ON s.id_kullanici = ud.id_kullanici INNER JOIN kategori k ON k.id_kategori = ud.id_kullanici WHERE k.id_kategori=1 LIMIT 6 ";
                $sonuclar=$DB->get_results($sql1);
                foreach ($sonuclar as $kategori){
                    echo '
                    <li>
                            <div class="left"><a href="#">'.$kategori->baslik.'</a></div>
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
                $sql1="SELECT ud.id_kullanici, k.id_kategori, k.kategori_ad, s.baslik FROM uye_detay ud INNER JOIN soru s ON s.id_kullanici = ud.id_kullanici INNER JOIN kategori k ON k.id_kategori = ud.id_kullanici WHERE k.id_kategori=2 LIMIT 6";
                $sonuclar=$DB->get_results($sql1);
                foreach ($sonuclar as $kategori){
                    echo '
                    <li>
                            <div class="left"><a href="#">'.$kategori->baslik.'</a></div>
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
                $sql1="SELECT ud.id_kullanici, k.id_kategori, k.kategori_ad, s.baslik FROM uye_detay ud INNER JOIN soru s ON s.id_kullanici = ud.id_kullanici INNER JOIN kategori k ON k.id_kategori = ud.id_kullanici WHERE k.id_kategori=3 LIMIT 6";
                $sonuclar=$DB->get_results($sql1);
                foreach ($sonuclar as $kategori){
                    echo '
                    <li>
                            <div class="left"><a href="#">'.$kategori->baslik.'</a></div>
                            <div class="right"></div>
                            <div class="clearer">&nbsp;</div>
                    </li>';                

                }
                ?>
            </ul>

    </div>
			
</div>