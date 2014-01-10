<?php
/**
 * Description of kontroller
 *
 * @author Adem
 */
class kontroller {
    public function kontrol($karakter){
        if(get_magic_quotes_gpc()) {
                $karakter = stripslashes($karakter);
        }
        elseif(!get_magic_quotes_gpc()) {
                $karakter = addslashes($karakter);
        }
        $karakter = @mysql_real_escape_string(trim(htmlspecialchars($karakter)));
        return $karakter;
}
    public function sifrele($sifre){
                $sifre=sha1(md5(trim($sifre)));
                return $sifre;
	}

}
