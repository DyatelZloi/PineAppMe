-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:8889
-- Время создания: Сен 16 2016 г., 14:20
-- Версия сервера: 5.1.73-community-log
-- Версия PHP: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pinappme`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `about` text,
  `id_user` varchar(255) NOT NULL,
  `сover` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_album`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id_album`, `name`, `about`, `id_user`, `сover`) VALUES
(6, '555', '555333', '123', 'wren_patrol_unit_by_joshcorpuz85-d9j445c.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_session`
--

CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `timestamp` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `data`, `timestamp`) VALUES
('00613929aa60678c9dd29776128745ffad28fae4', '127.0.0.1', '__ci_last_regenerate|i:1473417075;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('02db11d7f8f8f64c04f3bcf99f25aca7702eab42', '127.0.0.1', '__ci_last_regenerate|i:1473402557;', '0000-00-00'),
('02e495dc58bc8c6d52f08a722db001e8bef7b7a5', '127.0.0.1', '__ci_last_regenerate|i:1473922736;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('0311f03246425b05d2821d030d3d8ec2a7e37d20', '127.0.0.1', '__ci_last_regenerate|i:1473750395;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('03ab057e260e4d687d1c7031a910e904845da914', '127.0.0.1', '__ci_last_regenerate|i:1473847111;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('040cac13cfec86ad7100f9c33b0fe5af9d8ab175', '127.0.0.1', '__ci_last_regenerate|i:1473921960;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('05947c70df57059b44f273c5458a1c803c19ee2f', '127.0.0.1', '__ci_last_regenerate|i:1473330336;id_user|s:6:"google";username|s:6:"google";email|s:16:"google@gmail.com";logged_in|b:1;', '0000-00-00'),
('05972e932c4f282a20e487b1db83537a43873554', '127.0.0.1', '__ci_last_regenerate|i:1473668867;', '0000-00-00'),
('05d9c739e70622e5d4340a69505049c275ecdfbb', '127.0.0.1', '__ci_last_regenerate|i:1473929669;name|s:3:"123";id_user|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('07ee08cea2e82f21ee2b5711762c1fb533fdf7d1', '127.0.0.1', '__ci_last_regenerate|i:1473766592;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('08288576e24fec8901db358754074856f7413616', '127.0.0.1', '__ci_last_regenerate|i:1473765456;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('08fcea47bc34ddb357f3b0453dc41b97764d1c6d', '127.0.0.1', '__ci_last_regenerate|i:1473920915;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('0eb7d811ffc06f5767b5d3065f82ec6e6a29a7db', '127.0.0.1', '__ci_last_regenerate|i:1473938517;name|s:3:"123";id_user|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('0eea647e9bb42c1216a28e75266e61e60055e20b', '127.0.0.1', '__ci_last_regenerate|i:1473417391;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('0f15c2e5dce75223a3880febc9c0de86869ad43f', '127.0.0.1', '__ci_last_regenerate|i:1473322008;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('0f9e0c1d178f1576aa1adf49ec52349ddf06bedd', '127.0.0.1', '__ci_last_regenerate|i:1473849731;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('107679a9437d2903807b0ba0962ac8b6b19068db', '127.0.0.1', '__ci_last_regenerate|i:1473848989;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('10a2ce0de433b2386625e5bb2a38b55b806dabb6', '127.0.0.1', '__ci_last_regenerate|i:1474013181;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('119bea52b839a7f2b03cff1c7a8bbe71636763be', '127.0.0.1', '__ci_last_regenerate|i:1473848636;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('11f3002056f3b6a9ad1e9ed657b9b29a7c3e8d23', '127.0.0.1', '__ci_last_regenerate|i:1473244939;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('138bacc680a37e3a1bb11d2b4c08b7014de9d939', '127.0.0.1', '__ci_last_regenerate|i:1473765141;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('14d480358a377f98f1401e16d6dcc1a88c589cde', '127.0.0.1', '__ci_last_regenerate|i:1473916361;', '0000-00-00'),
('158aa232ca22a9672ed6ced055c130c966f01c7b', '127.0.0.1', '__ci_last_regenerate|i:1473929353;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('16b80367b2b1bd92543109050efb4afaea596871', '127.0.0.1', '__ci_last_regenerate|i:1473920573;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('1732b4e9d5b4099ecb5f769e503129cbe0622757', '127.0.0.1', '__ci_last_regenerate|i:1473419219;', '0000-00-00'),
('181d80aa1d263a0e38b21a8c549739e3f8644727', '127.0.0.1', '__ci_last_regenerate|i:1473416500;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('18b1be986cebae934cbb6d09a4b2988c1b5a0dec', '127.0.0.1', '__ci_last_regenerate|i:1473746977;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('1a7ccf827057a160f2b84632e23ac9999739eeff', '127.0.0.1', '__ci_last_regenerate|i:1473926554;', '0000-00-00'),
('1b19005fcf09b40556b4a8ec184568b955dbd27d', '127.0.0.1', '__ci_last_regenerate|i:1473839100;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('1c0df56128f6df14f655620c9aa3be513773b5e4', '127.0.0.1', '__ci_last_regenerate|i:1473838665;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('1cc5cbf90563f2a74ac79295f914934fbc05bdce', '127.0.0.1', '__ci_last_regenerate|i:1473746228;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('1d15128a22ce27c087196505f57f96bf5fad173a', '127.0.0.1', '__ci_last_regenerate|i:1473853161;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('2378f8cbd67060d6d3f2e2410f20d5c2e6209362', '127.0.0.1', '__ci_last_regenerate|i:1473418883;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('2482211759024ab26cd6660c6d292b795747c0bc', '127.0.0.1', '__ci_last_regenerate|i:1474019758;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('263568c5afcafc004760be97ff828b8b5f52aa00', '127.0.0.1', '__ci_last_regenerate|i:1473936000;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('2a00b8ce7a2ddab5140a083b93bc666497827ace', '127.0.0.1', '__ci_last_regenerate|i:1473657924;', '0000-00-00'),
('2a4830a7b885e9c5d1a7c2fd860704d51dafab71', '127.0.0.1', '__ci_last_regenerate|i:1473239993;id_user|s:1:"2";username|s:1:"2";email|s:1:"2";logged_in|b:1;', '0000-00-00'),
('2a8de992faba7fa4e0c250fe41b2522e35a22f30', '127.0.0.1', '__ci_last_regenerate|i:1473328962;id_user|s:6:"google";username|s:6:"google";email|s:16:"google@gmail.com";logged_in|b:1;', '0000-00-00'),
('2c3b0c9c4b7938b3de41454ab3992d8dafbb09ca', '127.0.0.1', '__ci_last_regenerate|i:1473245594;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('2c90e3ff29581cc1ccd6422f5387cd36d9044bda', '127.0.0.1', '__ci_last_regenerate|i:1473322902;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('2d14ec7c828ce005a0997d23e9d5c59d7c6ab7b6', '127.0.0.1', '__ci_last_regenerate|i:1473842952;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('2e35662c7784cf08f9eb3103aa7613cc416632c0', '127.0.0.1', '__ci_last_regenerate|i:1473755598;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('2f3a2d0261f76220d45064834e2f3b8b3fb01e06', '127.0.0.1', '__ci_last_regenerate|i:1473409633;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('2f6a76c97f00275a8dfb0243ab29c72a0a75c6e3', '127.0.0.1', '__ci_last_regenerate|i:1473244083;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('30295281aea9b1d391177a9dbea3f9b9dbce16cc', '127.0.0.1', '__ci_last_regenerate|i:1473401799;', '0000-00-00'),
('313113f04504f4ae239044d9d86ac02f81f3cd41', '127.0.0.1', '__ci_last_regenerate|i:1473232009;email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('326ca5c5c4e6039fdea84f3810ef9160a318272a', '127.0.0.1', '__ci_last_regenerate|i:1473233015;', '0000-00-00'),
('344ac5032f8fc0701faf1a8ca36559ff0f63d853', '127.0.0.1', '__ci_last_regenerate|i:1473924125;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('3713c1fe6f0ceea142e64908b1f99f04ff6f8301', '127.0.0.1', '__ci_last_regenerate|i:1473410574;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('37b71a3fa18ea37279620ae7437a22792624e03c', '127.0.0.1', '__ci_last_regenerate|i:1473326677;', '0000-00-00'),
('37b7da443ec30b8d86bf380a4d903225f93b030b', '127.0.0.1', '__ci_last_regenerate|i:1473745141;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('38acc89bcaab461f14264291a996a49cf7d2d04f', '127.0.0.1', '__ci_last_regenerate|i:1473930467;name|s:14:"Никифор";', '0000-00-00'),
('39e8b1f9b69049032ec4c683765c4e1232e2adca', '127.0.0.1', '__ci_last_regenerate|i:1473320902;', '0000-00-00'),
('3ac3ec88a1df605c161914cda3966dce880497f4', '127.0.0.1', '__ci_last_regenerate|i:1473748455;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('3b57d09be203356031cd8b400f172ad76c4f18bf', '127.0.0.1', '__ci_last_regenerate|i:1473744826;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('3d5bcbc527bc9bc36925f1e1e27370918e587212', '127.0.0.1', '__ci_last_regenerate|i:1473842600;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('3dd0786158e607382623c17431e3ade0ee9bbbb3', '127.0.0.1', '__ci_last_regenerate|i:1474017992;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('4009d9ae078e233266b8f9e3d92387a3fd9856b9', '127.0.0.1', '__ci_last_regenerate|i:1473406042;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('40397e7ff0edb96e6d7744a0514e62cc05259b71', '127.0.0.1', '__ci_last_regenerate|i:1473332469;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('40bacd80e9bf5d2d4a0d0a1e89debe75c718d3b3', '127.0.0.1', '__ci_last_regenerate|i:1473680577;', '0000-00-00'),
('4166774edc05da0cc78483274edef213443a0948', '127.0.0.1', '__ci_last_regenerate|i:1473321288;', '0000-00-00'),
('42fb3933e1abfbff0203403df944b45d26888bcf', '127.0.0.1', '__ci_last_regenerate|i:1473916363;', '0000-00-00'),
('4612ddc12f8db7d5110941f72654d6c7be9cf057', '127.0.0.1', '__ci_last_regenerate|i:1473925481;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('463d73bfec62d67f56157b6746ff323c2b5cabc7', '127.0.0.1', '__ci_last_regenerate|i:1473917461;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('46817f20948d16e5d1c3e94ced2cb072636dd379', '127.0.0.1', '__ci_last_regenerate|i:1473918891;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('46ffddfd1a1afe56284a21656cdd15c8b238f7d0', '127.0.0.1', '__ci_last_regenerate|i:1473236911;', '0000-00-00'),
('472358c9b475ec6e69e29e1dc533278b7dd19d64', '127.0.0.1', '__ci_last_regenerate|i:1473332156;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('47f6fe4fed22507286beb38de702ed2699c9552b', '127.0.0.1', '__ci_last_regenerate|i:1473916830;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('4808b1fb4685e330347a6e8321dd1e0d310207ce', '127.0.0.1', '__ci_last_regenerate|i:1473852551;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('48d711ee2145d9254623eabe6ca6f8b1bba66f1c', '127.0.0.1', '__ci_last_regenerate|i:1473331413;id_user|s:6:"google";username|s:6:"google";email|s:16:"google@gmail.com";logged_in|b:1;', '0000-00-00'),
('4a5515ae71b3a7906120c655e1ae0ad2f3ecfbb6', '127.0.0.1', '__ci_last_regenerate|i:1473917136;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('4b8617728054fee802247110e367abea4fbb9e86', '127.0.0.1', '__ci_last_regenerate|i:1473415523;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('4e3e7409f2f69e045ed781e92b87438d1ffaf5e1', '127.0.0.1', '__ci_last_regenerate|i:1473327803;', '0000-00-00'),
('4ea987caea4ceb204e7768245438b326bb8b57f2', '127.0.0.1', '__ci_last_regenerate|i:1473840355;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('4efc5f34722091023d312f3e2ded6967767d1b01', '127.0.0.1', '__ci_last_regenerate|i:1473845766;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('51b2ba64d6cd1a036bd352282828453ef2abc5ab', '127.0.0.1', '__ci_last_regenerate|i:1473405542;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('52f6a80f4aca4cc54aa09e99dcb0fcf4db5f5d60', '127.0.0.1', '__ci_last_regenerate|i:1473745818;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('54ac814d6a373227e9f813bb20943719508bc6f0', '127.0.0.1', '__ci_last_regenerate|i:1473249152;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('5610ced7ed20cc041dcad61452e2b95a22b386d3', '127.0.0.1', '__ci_last_regenerate|i:1473665953;', '0000-00-00'),
('570230b0d5d4d9deb764c09d16e3c717a3aa9ddf', '127.0.0.1', '__ci_last_regenerate|i:1473239075;', '0000-00-00'),
('571312da46eb1bd197a5ff65723bab4ef402ef23', '127.0.0.1', '__ci_last_regenerate|i:1473410969;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('5a264cb866d5b64a54db7186dced716c738f1ec3', '127.0.0.1', '__ci_last_regenerate|i:1473409833;', '0000-00-00'),
('5a84c0c06aea2f190887bb45447687aa56bb2ab9', '127.0.0.1', '__ci_last_regenerate|i:1473660331;', '0000-00-00'),
('5aa6a0cd9c85cbedc54669948b1d0f7b0e03ee9b', '127.0.0.1', '__ci_last_regenerate|i:1473854173;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('5abdde2d5e2464b4f627db6722704356cd17a837', '127.0.0.1', '__ci_last_regenerate|i:1473246952;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('5c542bfebc34aa96687e4d1fad44ff901681cf59', '127.0.0.1', '__ci_last_regenerate|i:1473243155;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('5e62f014c2a0a48f46593c9812636f6dc268bba2', '127.0.0.1', '__ci_last_regenerate|i:1473680250;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('5ece2201d086dc7ce71b16c12283f70d472a96d0', '127.0.0.1', '__ci_last_regenerate|i:1473852232;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('5ee3abab336f7d946cb2a1cccab6ca8333635535', '127.0.0.1', '__ci_last_regenerate|i:1473664469;', '0000-00-00'),
('5fdd5fbdbb9a5bbcd180dbf8b7813022722e65cb', '127.0.0.1', '__ci_last_regenerate|i:1473928240;id_user|s:13:"nikiformalkov";username|s:14:"Никифор";email|s:23:"nikiformalkov@gmail.com";logged_in|b:1;', '0000-00-00'),
('6006645a140774fd6e3ccd9176ecdad621de81a6', '127.0.0.1', '__ci_last_regenerate|i:1473921741;', '0000-00-00'),
('619f38f6f7ecd18431ebd768c8d68c3640d37c9e', '127.0.0.1', '__ci_last_regenerate|i:1473663778;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('61fa9dd54091485ee42e49ab524a6d824752af7b', '127.0.0.1', '__ci_last_regenerate|i:1474016660;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('623b0dbdb8635219e7f2afc418076a405ac4cc4f', '127.0.0.1', '__ci_last_regenerate|i:1473830935;', '0000-00-00'),
('6299ca1c39c3fc23c42f8d03145dd6dcbf5303a1', '127.0.0.1', '__ci_last_regenerate|i:1474014349;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('635d8a145f03bd6fdd00384bf8081e131c92267d', '127.0.0.1', '__ci_last_regenerate|i:1473933322;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('63d636d0491947387e3c18bb37b554067ffd06da', '127.0.0.1', '__ci_last_regenerate|i:1473419523;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('654bde71471b1c3442015f1e47e40077d6767e08', '127.0.0.1', '__ci_last_regenerate|i:1474002236;', '0000-00-00'),
('663d531736378376e98c768dc55981a4cdaf4580', '127.0.0.1', '__ci_last_regenerate|i:1473418557;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('674801f0e0edf1c06f25fe0f400d38e86e88463a', '127.0.0.1', '__ci_last_regenerate|i:1473662790;', '0000-00-00'),
('6753afb0890b014f6d373fad92235c508fa48515', '127.0.0.1', '__ci_last_regenerate|i:1473840020;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('68e7422a0fab65e281bb5e192b2fdd5c376542c6', '127.0.0.1', '__ci_last_regenerate|i:1473414559;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('698b3623254424b08e409229e4b5900f570cdbcf', '127.0.0.1', '__ci_last_regenerate|i:1473236507;', '0000-00-00'),
('698cadc18bac71aab2f6bc4d9b095e15e746a0f8', '127.0.0.1', '__ci_last_regenerate|i:1473749579;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('6c723d98ce043c2b1d7b9fa011b697da4597c418', '127.0.0.1', '__ci_last_regenerate|i:1473920160;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('6ca73b2b8c622b239b4d289e135a66cf8bee1b51', '127.0.0.1', '__ci_last_regenerate|i:1473248211;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('6d955859dfaedb405f4830fc21617358fe602aec', '127.0.0.1', '__ci_last_regenerate|i:1473402142;', '0000-00-00'),
('6e333ae12a8d6378eaab13ce6865ad14c214fa2f', '127.0.0.1', '__ci_last_regenerate|i:1473325261;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('7109a33783b75122b07c39f0d3f498e1e5b2c989', '127.0.0.1', '__ci_last_regenerate|i:1473936493;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('731fcdb2242a24bc2bbae779bd284dca715ac16b', '127.0.0.1', '__ci_last_regenerate|i:1473322309;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('73eede70a597ae68add4256da3d6134cfa6668c1', '127.0.0.1', '__ci_last_regenerate|i:1473413639;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('741707e19ce19695a5e80c5977f8e7143353c4fc', '127.0.0.1', '__ci_last_regenerate|i:1473321699;', '0000-00-00'),
('749a01720f7a4392cdaae1125c9888c0380b1e71', '127.0.0.1', '__ci_last_regenerate|i:1474004989;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('74f606b6f796c1d8fa849975d5821ce421336e31', '127.0.0.1', '__ci_last_regenerate|i:1473237265;', '0000-00-00'),
('7509f94d587082d41ed579233b2c8dd00b93390d', '127.0.0.1', '__ci_last_regenerate|i:1473749584;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('7563fc876eef306b2079c6758344aeadab3a565f', '127.0.0.1', '__ci_last_regenerate|i:1473853808;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('76542169a29e6f1d7488fd54904f604f943e8094', '127.0.0.1', '__ci_last_regenerate|i:1473227993;username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('7664b49a77747dde7965bb1f507bad788e39e1ff', '127.0.0.1', '__ci_last_regenerate|i:1473323906;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('76b57bc68260b994bc21719fb847f5eff535528c', '127.0.0.1', '__ci_last_regenerate|i:1473335864;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('772173432b2af2cb8e0e96a8e8c13d7fe46e9597', '127.0.0.1', '__ci_last_regenerate|i:1473850967;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('77cebdf8320e8d5c5246bf70be7237294b82a600', '127.0.0.1', '__ci_last_regenerate|i:1473927204;id_user|s:14:"Никифор";username|s:14:"Никифор";email|s:23:"nikiformalkov@gmail.com";logged_in|b:1;', '0000-00-00'),
('781e778796a402796a56edf4c3ca2336d9ac02c1', '127.0.0.1', '__ci_last_regenerate|i:1473411781;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('793f7a3ccdcdd8cc580470bb4a5bef50b5deea5b', '127.0.0.1', '__ci_last_regenerate|i:1473764832;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('79dd39bd26fa6a43aeee0859ea32e9bb46c3bd0a', '127.0.0.1', '__ci_last_regenerate|i:1473319613;', '0000-00-00'),
('7a582e108a4e21cce010a87681735ad6850d8b77', '127.0.0.1', '__ci_last_regenerate|i:1473921229;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('7f7618c7a776cffc468e98ad690b46d4c2c64e1f', '127.0.0.1', '__ci_last_regenerate|i:1473832296;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('7f9d0bf819565e5c2bd907949fb91a11c9b2a087', '127.0.0.1', '__ci_last_regenerate|i:1473744513;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('7fbecff340039992f92a6c37491bc3563846550c', '127.0.0.1', '__ci_last_regenerate|i:1473310900;', '0000-00-00'),
('81847a9504adfe5780893fd87a6ca52daf0f2180', '127.0.0.1', '__ci_last_regenerate|i:1473924529;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('81f468640970bd232bdd5c9d0024b5defac0e893', '127.0.0.1', '__ci_last_regenerate|i:1473412520;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('82a624f84914ba8fb60dfc3c16439f14402119a9', '127.0.0.1', '__ci_last_regenerate|i:1473918126;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('83cbfcf065a2fe4b32591f495fe9005999e45f1f', '127.0.0.1', '__ci_last_regenerate|i:1474017368;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('84fa5560bf727610a7b70ca60837f9eeacb770ab', '127.0.0.1', '__ci_last_regenerate|i:1474017060;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('850e433561f77419330895246cae6f36a1d38025', '127.0.0.1', '__ci_last_regenerate|i:1473414197;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('85c0fd25c315b71a56648bdebf7ab3bf07f3f8c8', '127.0.0.1', '__ci_last_regenerate|i:1473332815;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('87195934e89d9c74bd774de64afbbcc110274007', '127.0.0.1', '__ci_last_regenerate|i:1473927937;id_user|s:13:"nikiformalkov";username|s:14:"Никифор";email|s:23:"nikiformalkov@gmail.com";logged_in|b:1;', '0000-00-00'),
('87bbaec5cb4dab87f435b85c323b99f3f5c7b0bf', '127.0.0.1', '__ci_last_regenerate|i:1473928556;id_user|s:13:"nikiformalkov";username|s:14:"Никифор";email|s:23:"nikiformalkov@gmail.com";logged_in|b:1;', '0000-00-00'),
('881204402e6f983fd5e368a76fa71d0b5f73ee74', '127.0.0.1', '__ci_last_regenerate|i:1473839583;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('889531ffefb18ac153a21089c48d7338dac40bbb', '127.0.0.1', '__ci_last_regenerate|i:1473917764;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('897c10471fe076cfc1b83a63217918334ca4e764', '127.0.0.1', '__ci_last_regenerate|i:1473412854;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('8a73d83da5a3e67fcc7791fe93104aec11eee918', '127.0.0.1', '__ci_last_regenerate|i:1473661932;', '0000-00-00'),
('8cb150ce4b81baf8c6d021e2332b0dc2f8d74a54', '127.0.0.1', '__ci_last_regenerate|i:1473922363;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('90e9ef34ca0d20e0c8b4e74186e45bc3d70064d7', '127.0.0.1', '__ci_last_regenerate|i:1473411345;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('91472f3986ce63bef3ff56a3f7a3c68c19221783', '127.0.0.1', '__ci_last_regenerate|i:1473403648;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('924fd068c340adaf3f6d0aa1ad2d679ae6852a53', '127.0.0.1', '__ci_last_regenerate|i:1473402903;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('92b2b8396da7cb7625bc098b062cc3a2e71f5fee', '127.0.0.1', '__ci_last_regenerate|i:1474019385;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('935f87189942f1f868ef0393387845b8f4bd31d7', '127.0.0.1', '__ci_last_regenerate|i:1473662721;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('936c274bc565ba2b359e3f634bdaf638675b2d8a', '127.0.0.1', '__ci_last_regenerate|i:1473926880;', '0000-00-00'),
('939cd5ea6637d439a7562dff46470605f89ff211', '127.0.0.1', '__ci_last_regenerate|i:1473228584;username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('9421ca1ad5b5d38d5ad2bdadaead859f4a0c9003', '127.0.0.1', '__ci_last_regenerate|i:1473410273;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('9457819e32ef6c23dc9c1f1cf99ae11001db2694', '127.0.0.1', '__ci_last_regenerate|i:1473841889;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('952d45869c3728484c9c58d6f29c00a61f949137', '127.0.0.1', '__ci_last_regenerate|i:1474017680;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('95fa73109203e01dbcfe32d4512b234beaa684d1', '127.0.0.1', '__ci_last_regenerate|i:1473325850;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('96130fbfa8402a39b46badc6c0fc17ab090a6e06', '127.0.0.1', '__ci_last_regenerate|i:1473242733;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('9a89e5d9cbb8e6f212da6d22e9f98b1cdddcfc62', '127.0.0.1', '__ci_last_regenerate|i:1474018714;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('9c0069f37772d2bf5fdadee717e92ae814e83130', '127.0.0.1', '__ci_last_regenerate|i:1473847972;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('9c4ba4f32b721300caadfe070ade320b4c6f88e6', '127.0.0.1', '__ci_last_regenerate|i:1473919286;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('9dd8a6c7ed8bc206a33d4f4d9f7e0559e0cdd4e6', '127.0.0.1', '__ci_last_regenerate|i:1473748837;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('9fad9a1560704d44e048ccd59c06db5ececddc94', '127.0.0.1', '__ci_last_regenerate|i:1473753098;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('a19edf557b8b7c5968ec0760e8f73c5d85b6a997', '127.0.0.1', '__ci_last_regenerate|i:1473935076;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('a66b56f3c79c8e1acfecc0304079a33d0f6958c1', '127.0.0.1', '__ci_last_regenerate|i:1473241515;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('a7446cf9209c128fdb111c736d3f90a68a79c600', '127.0.0.1', '__ci_last_regenerate|i:1473230765;username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('a7db9b126946df1c8d1fde83d72cb69fc1e5c06e', '127.0.0.1', '__ci_last_regenerate|i:1473749162;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('a8e299aa9858f83695ce60bf09b13d918f612239', '127.0.0.1', '__ci_last_regenerate|i:1473660832;', '0000-00-00'),
('a931861de5e42c0efcdc5070337f13948127bae6', '127.0.0.1', '__ci_last_regenerate|i:1473681506;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('aacfbee3e2aa988a646fa8374f342e60a2898b25', '127.0.0.1', '__ci_last_regenerate|i:1473679852;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('aae7f53babc942b5c30058420cf07f7c19c2a0c6', '127.0.0.1', '__ci_last_regenerate|i:1473238456;', '0000-00-00'),
('ab485c3c8da3801d53140a2809d5e7e0884d2140', '127.0.0.1', '__ci_last_regenerate|i:1473417694;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('ab4bee6fa9aee86387cf7248b309576ab8dc6b64', '127.0.0.1', '__ci_last_regenerate|i:1473408660;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('abfdc79237f5cb53de775fc38c953672aeec0ee8', '127.0.0.1', '__ci_last_regenerate|i:1473846208;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('acafa5bb83065c1f9a4920a05c33612d7dba3ffe', '127.0.0.1', '__ci_last_regenerate|i:1473236170;', '0000-00-00'),
('aedbbdeeb64432f6c547535d43cb45f70b227105', '127.0.0.1', '__ci_last_regenerate|i:1473833754;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('afd02ab4e40a5ec1ecda2c331186acdd8cfadc94', '127.0.0.1', '__ci_last_regenerate|i:1474005898;name|s:3:"123";', '0000-00-00'),
('b1adbab65c94230881eca0c00d524b623c1adc15', '127.0.0.1', '__ci_last_regenerate|i:1473851743;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('b47db599a5d4f843fc8617995291382b8068c064', '127.0.0.1', '__ci_last_regenerate|i:1473852860;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('b4b3408e78bcf745abd2b9e544d9691de14b74a3', '127.0.0.1', '__ci_last_regenerate|i:1473765770;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('b738d125891976cc28f9189076c5a14abb507600', '127.0.0.1', '__ci_last_regenerate|i:1473237781;', '0000-00-00'),
('b7bf301504a388206ada53510a9ecd21f64568ba', '127.0.0.1', '__ci_last_regenerate|i:1473922057;', '0000-00-00'),
('b82f8de0d0b46a9c093f6eb1c22b755ab2bba5d4', '127.0.0.1', '__ci_last_regenerate|i:1473239684;', '0000-00-00'),
('b8374f80096eedb785da5abd5bffe277ab7690f7', '127.0.0.1', '__ci_last_regenerate|i:1473747441;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('b912d9a75fa4f8f915e43ec188a7b8f1b0b4d05b', '127.0.0.1', '__ci_last_regenerate|i:1473398705;', '0000-00-00'),
('b93f8a0f2a0d36a77b7c5dc9e301521a15db95a4', '127.0.0.1', '__ci_last_regenerate|i:1473932386;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('ba27e63f1584332d5674c0b823bfdbdab25d21db', '127.0.0.1', '__ci_last_regenerate|i:1473242404;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('ba3037018a85fb5d0575dcc9e3b31b78723184ea', '127.0.0.1', '__ci_last_regenerate|i:1473921637;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('ba63da246309c9169d2440b8ae39f491e0280d90', '127.0.0.1', '__ci_last_regenerate|i:1473409969;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('ba94430ceac620087ec5b1ae790e246c843f17b6', '127.0.0.1', '__ci_last_regenerate|i:1473420535;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('baa067a016169f48dbd4ccda94ee17c57bb65725', '127.0.0.1', '__ci_last_regenerate|i:1473846556;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('babcf1506c6cdaad796eebdb0967f1a4f22cda63', '127.0.0.1', '__ci_last_regenerate|i:1473407935;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('bc79fdb293687847111b1d4a9613094b1ba44bce', '127.0.0.1', '__ci_last_regenerate|i:1473665208;', '0000-00-00'),
('bcde74b44e2ce4e2447d515779f5428af03b2e2b', '127.0.0.1', '__ci_last_regenerate|i:1473420868;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('bebf0066d4b76c6b0e64267739c816e79d57f879', '127.0.0.1', '__ci_last_regenerate|i:1473664109;', '0000-00-00'),
('bf448cb20c8929aa3d6afe0e6aa722546f674a80', '127.0.0.1', '__ci_last_regenerate|i:1473238133;', '0000-00-00'),
('bf89133166dc52dc9861dc255194e337586f0e25', '127.0.0.1', '__ci_last_regenerate|i:1473232324;email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('bf9dc249f186d1e2d2bdf00a89d6a8a310c357f5', '127.0.0.1', '__ci_last_regenerate|i:1473331842;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('c13a3f8c5b066d4d6d8e57ab2bdd9ecc10117fcd', '127.0.0.1', '__ci_last_regenerate|i:1473243458;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('c1ecf058d84d39dffd306598bd13c2338a18555e', '127.0.0.1', '__ci_last_regenerate|i:1473752768;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('c4b1883638756c0a5cb26d0e64ee81b8523790a5', '127.0.0.1', '__ci_last_regenerate|i:1473662349;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('c5e8223896e443ef8b29fcc74db0b7b62c419160', '127.0.0.1', '__ci_last_regenerate|i:1473841412;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('c63ca3dba1bce49e7833d06b47656948883a45d2', '127.0.0.1', '__ci_last_regenerate|i:1473929052;', '0000-00-00'),
('c650c562c733768e6b74d626b7b1bffc6ad0ed0a', '127.0.0.1', '__ci_last_regenerate|i:1473328140;id_user|s:6:"google";username|s:6:"google";email|s:16:"google@gmail.com";logged_in|b:1;', '0000-00-00'),
('c7502a9a804478a30a8f561932e76747ccf416ea', '127.0.0.1', '__ci_last_regenerate|i:1473403347;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('c80e40edfdd3a2103328fba402310fcde189663d', '127.0.0.1', '__ci_last_regenerate|i:1473319914;', '0000-00-00'),
('cbf18c0f923e71a14862df334655ed6f59d7563a', '127.0.0.1', '__ci_last_regenerate|i:1473919626;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('cd2362a173a50f5a54a2356024c2a5659a17fa19', '127.0.0.1', '__ci_last_regenerate|i:1473764385;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('d0b95fcedcddc701e6e88a94a14eb313ab162060', '127.0.0.1', '__ci_last_regenerate|i:1473750624;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('d188b9a7e235e29f21d9037cc415b7b3e111a89d', '127.0.0.1', '__ci_last_regenerate|i:1473326182;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('d1c415f5f51371fb2e9432cd8f9de25d141a1071', '127.0.0.1', '__ci_last_regenerate|i:1473421193;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('d1eb75d398e70031d0b5ac14d03d28725c2827e5', '127.0.0.1', '__ci_last_regenerate|i:1473742689;', '0000-00-00'),
('d2201c700975207743701da10efb0386c7ec2e45', '127.0.0.1', '__ci_last_regenerate|i:1473849303;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('d3c2996f426c052deb053e9a24061331fcbd1c46', '127.0.0.1', '__ci_last_regenerate|i:1473851402;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('d871fbf6bd60d46f080313dfaf1906daff6b1559', '127.0.0.1', '__ci_last_regenerate|i:1473412092;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('d8dfd69b0f2885e8d9bfc2c354d5bb6e66e13807', '127.0.0.1', '__ci_last_regenerate|i:1473408260;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('da0d8ea56e7df1bd2c092ff3935596bf7c9c5410', '127.0.0.1', '__ci_last_regenerate|i:1473231126;email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('da53c40a3b4d656c48cfbbf72abf6d1982e903a4', '127.0.0.1', '__ci_last_regenerate|i:1473413173;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('db41836dbcce70a0b2e806dfe5f8da9a0c360c2a', '127.0.0.1', '__ci_last_regenerate|i:1473327485;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('db5e3cb8f2d9456caead077999f587dfa0df5ec0', '127.0.0.1', '__ci_last_regenerate|i:1473766145;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('db9e29c4c232c611ab6e63fb6ef7842aa84fe13f', '127.0.0.1', '__ci_last_regenerate|i:1473752418;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('dc667a42657a62622f1e9750d1b38b957c112b92', '127.0.0.1', '__ci_last_regenerate|i:1473925004;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('dcd89db43aa098d586948bc61717285004b5f863', '127.0.0.1', '__ci_last_regenerate|i:1473931561;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('debc6e3561dbe1c51e336f5a190d49f7d9ec3950', '127.0.0.1', '__ci_last_regenerate|i:1473930158;name|s:14:"Никифор";id_user|s:14:"Никифор";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('e0002a7f1ab18c1a5e355fc3aef956501d4b6be5', '127.0.0.1', '__ci_last_regenerate|i:1473930825;name|s:14:"Никифор";', '0000-00-00'),
('e228901b035b3ef568c7d7cd68380c68f50705b3', '127.0.0.1', '__ci_last_regenerate|i:1473679537;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('e22ad3a04a7082c9cea3ce6dabbb9d7ac9b49320', '127.0.0.1', '__ci_last_regenerate|i:1473925828;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('e35c3869efb9b0b70a3a2a2c56c11f8729994608', '127.0.0.1', '__ci_last_regenerate|i:1473241107;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('e400262f215f181f67c86f42349b24c5fb71d9f8', '127.0.0.1', '__ci_last_regenerate|i:1473938148;name|s:3:"123";id_user|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('e50605d32feff388c3f941df8a1782f0fe333ebd', '127.0.0.1', '__ci_last_regenerate|i:1473232655;email|s:1:"1";logged_in|b:1;id_user|s:1:"1";', '0000-00-00'),
('e74fbd5c783932166b51a0a64f27d9d2f7e5bd22', '127.0.0.1', '__ci_last_regenerate|i:1473664865;id_user|s:23:"nikiformalkov@gmail.com";username|s:14:"Никифор";email|s:23:"nikiformalkov@gmail.com";logged_in|b:1;', '0000-00-00'),
('ea41c5fde00e4e7a433489c9c1fa21bdaaab9224', '127.0.0.1', '__ci_last_regenerate|i:1473935699;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('ebde72be1b33d219a686844fe48eb1796ae013c9', '127.0.0.1', '__ci_last_regenerate|i:1473235849;', '0000-00-00'),
('eea2fbce32d1f6f16219653592b1eb8aca30c253', '127.0.0.1', '__ci_last_regenerate|i:1473241849;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('eebd358008a63e1bef3f983c3156afaf012598de', '127.0.0.1', '__ci_last_regenerate|i:1473840804;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('f0f974ef682203143fa52d3b4de345bfacc13d54', '127.0.0.1', '__ci_last_regenerate|i:1473853473;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('f1554c5dd0abe96fa34093de8c32004e5f28d249', '127.0.0.1', '__ci_last_regenerate|i:1473240400;id_user|s:1:"2";username|s:1:"2";email|s:1:"2";logged_in|b:1;', '0000-00-00'),
('f25552f2c82a59a5da03818780a74b9d3e85091c', '127.0.0.1', '__ci_last_regenerate|i:1473753073;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('f27533cd51426f8b2c2df450438ef32747b802db', '127.0.0.1', '__ci_last_regenerate|i:1473656659;', '0000-00-00'),
('f2c5b68a78c8a791f4ea719b5cad4e7d35ce8735', '127.0.0.1', '__ci_last_regenerate|i:1473246594;id_user|s:3:"123";username|s:7:"johndoe";email|s:21:"johndoe@some-site.com";logged_in|b:1;', '0000-00-00'),
('f2d3150fcae9072d43bdf8548142e90b9c9b687d', '127.0.0.1', '__ci_last_regenerate|i:1474004265;', '0000-00-00'),
('f4012083d7f90ddba9028c32c69d6ca130d2e8c6', '127.0.0.1', '__ci_last_regenerate|i:1473748067;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('f4201bbb6a3bd34b1c52097e1c6cd9ea40f72848', '127.0.0.1', '__ci_last_regenerate|i:1473749188;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('f50d9ad4348a0df01659b4658c6cb3b32ee284b9', '127.0.0.1', '__ci_last_regenerate|i:1473921313;', '0000-00-00'),
('f802f1103c23c6c47b3c704bbe6fcac7ca2fe1e6', '127.0.0.1', '__ci_last_regenerate|i:1473409128;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('f9439ab0882913789197eb2d4cf7d583a820f355', '127.0.0.1', '__ci_last_regenerate|i:1473927529;id_user|s:13:"nikiformalkov";username|s:14:"Никифор";email|s:23:"nikiformalkov@gmail.com";logged_in|b:1;', '0000-00-00'),
('fa0124b0f4f69f317787252f0c097544f92d3c4d', '127.0.0.1', '__ci_last_regenerate|i:1473834068;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('fa61f470d4ac08658ffb558a800e6f873116b952', '127.0.0.1', '__ci_last_regenerate|i:1473848285;id_user|s:4:"4444";username|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('fb9e8fffa5a253b06634e941992fd8320448aa16', '127.0.0.1', '__ci_last_regenerate|i:1473746657;id_user|s:3:"123";username|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00'),
('fc5e222e561f02e1bbdc51d82aff0b132b5c501f', '127.0.0.1', '__ci_last_regenerate|i:1473935397;name|s:4:"4444";id_user|s:4:"4444";email|s:17:"nikiforma@mail.ru";logged_in|b:1;', '0000-00-00'),
('fdd445beedb00223052f591f85e773569c1ca163', '127.0.0.1', '__ci_last_regenerate|i:1474018392;id_user|s:3:"123";name|s:3:"123";email|s:17:"13joker666@tut.by";logged_in|b:1;', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `path` text NOT NULL,
  `id_album` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT '0',
  PRIMARY KEY (`id_image`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id_image`, `id_user`, `views`, `path`, `id_album`, `likes`) VALUES
(9, '123', 23, '151ce8c34094a12ae754b4934bef991a-d53f79t.jpg', 0, 1),
(10, 'google', 4, '14094_1389814057.jpg', 0, 1),
(16, '123', 18, '6208936603_0abe8d2254_b.jpg', 0, 0),
(17, '123', 1, '4255dfcb0838060b5facf8353d13fcc1bfdd8c2adffc7ecbe6c283fe8584aace_1.jpg', 0, 0),
(18, '123', 1, 'ARTIST_ALESSANDRO_092.jpg', 0, 0),
(24, '123', 1, '62eeb3e3fb7239d76074a7cdcab8b989.jpg', 6, 1),
(25, 'nikiformalkov', 0, '0_4dee3_57b4240a_XXL.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) NOT NULL,
  `id_image` int(11) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `id_user` (`id_user`),
  KEY `id_image` (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `like`
--

INSERT INTO `like` (`id_like`, `id_user`, `id_image`) VALUES
(25, '4444', 9),
(29, '4444', 10),
(30, '4444', 24);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id_subscribe` int(11) NOT NULL AUTO_INCREMENT,
  `id_subscriber` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id_subscribe`),
  KEY `id_user` (`id_user`),
  KEY `id_subscriber` (`id_subscriber`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id_subscribe`, `id_subscriber`, `id_user`) VALUES
(2, '4444', '123'),
(3, 'google', '123'),
(4, '123', '4444'),
(5, '123', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `about` text,
  `sity` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `img` text,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `about`, `sity`, `birthday`, `role`, `img`, `password`) VALUES
('1', '1', '1', '1', '1', '0000-00-00', '1', '1', '1'),
('123', '123', '13joker666@tut.by', 'Ну типо тут что-то про меня ', NULL, '1995-04-04', NULL, NULL, '123'),
('2', '2', '2', NULL, NULL, NULL, NULL, NULL, '2'),
('4444', '4444', 'nikiforma@mail.ru', NULL, NULL, NULL, NULL, NULL, '4444'),
('google', 'google', 'google@gmail.com', NULL, NULL, NULL, NULL, NULL, 'google'),
('niki4', 'Nikifor', 'omfg@mail.com', NULL, NULL, NULL, NULL, NULL, 'omfg'),
('nikiformalkov', 'Никифор', 'nikiformalkov@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
('registration', 'registration', 'registration', NULL, NULL, NULL, NULL, NULL, 'registration');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `images` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_ibfk_1` FOREIGN KEY (`id_subscriber`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `subscribers_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
