-- phpMyAdmin SQL Dump
-- version 4.1.3
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Oca 2014, 12:37:20
-- Sunucu sürümü: 5.5.32
-- PHP Sürümü: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `myticketsystem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cevap`
--

CREATE TABLE IF NOT EXISTS `cevap` (
  `id_cevap` int(11) NOT NULL AUTO_INCREMENT,
  `id_soru` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `cevap` text NOT NULL,
  `tarih` datetime NOT NULL,
  `dosya` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cevap`),
  KEY `id_soru` (`id_soru`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `cevap`
--

INSERT INTO `cevap` (`id_cevap`, `id_soru`, `baslik`, `cevap`, `tarih`, `dosya`) VALUES
(1, 4, 'deneme cevap', 'bu bir deneme mesajı cevabıdır', '2014-01-11 02:00:00', NULL),
(2, 2, 'cevap iki', 'ikinci sorunun birinci cevabı', '2014-01-11 01:00:00', NULL),
(3, 2, 'cevap iki', 'ikinci sorunun ikinci cevabı ', '2014-01-11 04:00:00', NULL),
(4, 7, 'gereğini yapacağız', 'istek ve sorularınıza en kısa zaman c&ouml;z&uuml;m bulunacaktır\r\n', '2014-01-11 01:04:17', ''),
(5, 7, 'istek mesajı', 'deneme tekrarı&nbsp;deneme tekrarıdeneme tekrarı&nbsp;deneme tekrarı&nbsp;deneme tekrarı\r\n', '2014-01-11 01:09:06', ''),
(6, 7, 'deneme cevap', 'bu bir deneme mesajıdır\r\n', '2014-01-12 23:57:19', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_ad` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_ad`) VALUES
(1, 'Dilek'),
(2, 'Şikayet'),
(3, 'Teşekkür');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciad` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1-aktif, 2-pasif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullaniciad`, `email`, `password`, `status`) VALUES
(1, 'adem', 'karakus.adm@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soru`
--

CREATE TABLE IF NOT EXISTS `soru` (
  `id_soru` int(11) NOT NULL AUTO_INCREMENT,
  `id_kullanici` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `soru` text NOT NULL,
  `tarih` datetime NOT NULL,
  `dosya` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_soru`),
  KEY `id_kullanici` (`id_kullanici`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `soru`
--

INSERT INTO `soru` (`id_soru`, `id_kullanici`, `baslik`, `soru`, `tarih`, `dosya`) VALUES
(1, 1, 'deneme dilek ve istek', 'deneme mesajı  bır deneme mesakı sdsakdj', '2014-01-11 00:22:42', ''),
(2, 2, 'deneme şikayet mesajı', 'bu r deneme şikayet mesajıdır lütfen dikkate almayınız', '2014-01-11 00:24:06', ''),
(3, 3, 'her şey güzel olmuş', 'her şey güzel olmuş her şey güzel olmuş her şey güzel olmuş her şey güzel olmuş her şey güzel olmuş', '2014-01-11 00:25:41', ''),
(4, 4, 'Bir kaç özellik daha eklemesin ir kaç özellik daha eklemesin', 'proje bire kaç özellik daha eklemesılişd proje bire kaç özellik daha eklemesılişd proje bire kaç özellik daha eklemesılişd proje bire kaç özellik daha eklemesılişd proje bire kaç özellik daha eklemesılişd proje bire kaç özellik daha eklemesılişd', '2014-01-11 00:27:16', ''),
(5, 5, 'şikayetlerim', 'şikayetlerim var, şikayetlerim var, şikayetlerim var, şikayetlerim var, şikayetlerim var,', '2014-01-11 00:57:16', 'abandoned_to_live-wallpaper-1366x768.jpg'),
(6, 6, 'teşekkürlerimi iletiyorum saygılarımla', '<p>herşeyi&ccedil;in &ccedil;ok teşekk&uuml;r ederin herşeyi&ccedil;in &ccedil;ok teşekk&uuml;r ederin herşeyi&ccedil;in &ccedil;ok teşekk&uuml;r ederin herşeyi&ccedil;in &ccedil;ok teşekk&uuml;r ederin</p>\r\n', '2014-01-11 01:00:11', ''),
(7, 7, 'istek ve dilek mesajı', '<p>istek ve deneme mesajları &ouml;zelikleri artırın, istek ve deneme mesajları &ouml;zelikleri artırın istek ve deneme mesajları &ouml;zelikleri artırın istek ve deneme mesajları &ouml;zelikleri artırınistek ve deneme mesajları &ouml;zelikleri artırın istek ve deneme mesajları &ouml;zelikleri artırın istek ve deneme mesajları &ouml;zelikleri artırın</p>\r\n', '2014-01-11 01:02:25', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_detay`
--

CREATE TABLE IF NOT EXISTS `uye_detay` (
  `id_kullanici` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(2) NOT NULL,
  `ad` varchar(25) NOT NULL,
  `soyad` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifreleme` varchar(40) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-pasif, 1-soru, 2-cevaplanan',
  PRIMARY KEY (`id_kullanici`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `uye_detay`
--

INSERT INTO `uye_detay` (`id_kullanici`, `id_kategori`, `ad`, `soyad`, `email`, `sifreleme`, `ip`, `status`) VALUES
(1, 1, 'mehmet', 'kara', 'karakus.adm@gmail.com', '31bd9b9f5f7b338e41b56183a2f3008b541d7c84', '::1', 1),
(2, 2, 'abdullah', 'demir', 'karakus.adm@gmail.com', 'da5e0596682ba273067955b008fa4acc159bce0e', '::1', 2),
(3, 3, 'kerim', 'öztürk', 'karakus.adm@gmail.com', '25250e46745c8169531da0086e6bbc3369795330', '::1', 1),
(4, 1, 'dursun', 'satıcı', 'karakus.adm@gmail.com', 'fc7a734dba518f032608dfeb04f4eeb79f025aa7', '::1', 1),
(5, 2, 'Hakan', 'kahya', 'karakus.adm@gmail.com', 'f1abd670358e036c31296e66b3b66c382ac00812', '::1', 1),
(6, 3, 'mustafaa', 'keşap', 'karakus.adm@gmail.com', '14019988a92023b21c8fbafb2b615c6ce575da38', '::1', 2),
(7, 1, 'emirhann', 'karakus', 'karakus.adm@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '::1', 1);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cevap`
--
ALTER TABLE `cevap`
  ADD CONSTRAINT `cevap_ibfk_1` FOREIGN KEY (`id_soru`) REFERENCES `soru` (`id_soru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `soru`
--
ALTER TABLE `soru`
  ADD CONSTRAINT `soru_ibfk_1` FOREIGN KEY (`id_kullanici`) REFERENCES `uye_detay` (`id_kullanici`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
