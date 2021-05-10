-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2012 at 09:40 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lab_mjeksor`
--
CREATE DATABASE `lab_mjeksor` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `lab_mjeksor`;

-- --------------------------------------------------------

--
-- Table structure for table `analizat`
--

CREATE TABLE IF NOT EXISTS `analizat` (
  `id_analiza` int(11) NOT NULL AUTO_INCREMENT,
  `id_pacienti` int(11) NOT NULL,
  `pershkrimi` text COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_analiza`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `analizat`
--

INSERT INTO `analizat` (`id_analiza`, `id_pacienti`, `pershkrimi`, `data`) VALUES
(2, 32, 'mire mire', '2011-10-28 22:29:59'),
(3, 34, 'nuk keni diqka serioze', '2012-02-13 11:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `doktorri`
--

CREATE TABLE IF NOT EXISTS `doktorri` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fjalekalimi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `doktorri`
--

INSERT INTO `doktorri` (`id_doc`, `emri`, `fjalekalimi`) VALUES
(1, 'mjeku', 'a35fe7f7fe8217b4369a0af4244d1fca');

-- --------------------------------------------------------

--
-- Table structure for table `gjymtyret`
--

CREATE TABLE IF NOT EXISTS `gjymtyret` (
  `id_gjymtyra` int(11) NOT NULL AUTO_INCREMENT,
  `gjymtyra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_gjymtyra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gjymtyret`
--

INSERT INTO `gjymtyret` (`id_gjymtyra`, `gjymtyra`) VALUES
(1, 'kok'),
(3, 'stomaku'),
(4, 'sy'),
(5, 'vesh'),
(6, 'zemra');

-- --------------------------------------------------------

--
-- Table structure for table `pacientet`
--

CREATE TABLE IF NOT EXISTS `pacientet` (
  `id_pacienti` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mbiemri` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fjalekalimi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pacienti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `pacientet`
--

INSERT INTO `pacientet` (`id_pacienti`, `emri`, `mbiemri`, `fjalekalimi`, `e_mail`, `tel`) VALUES
(32, 'ilirian', 'ibrahimi', '202cb962ac59075b964b07152d234b70', 'lili@lili.com', 123),
(34, 'dardan', 'ramadani', '202cb962ac59075b964b07152d234b70', 'd@D.cm', 123),
(35, 'filan', 'fisteku', '777bbb7869ae8193249f8ff7d3e59afe', 'dsakl', 123),
(36, 'rozafa', 'ademi', 'b25e2324680e35bf63cd0e784c5c2893', 'r@r.com', 3434),
(37, 'bashkim', 'zeneli', '900150983cd24fb0d6963f7d28e17f72', 'b@b.com', 123),
(38, 'Hala', 'Ibrahimi', '5b203658f1b0da1596db00ba59ee753f', 'hala@postribe.com', 4987654),
(39, 'fidan', 'baliu', '202cb962ac59075b964b07152d234b70', 'poj', 123);

-- --------------------------------------------------------

--
-- Table structure for table `semundja`
--

CREATE TABLE IF NOT EXISTS `semundja` (
  `id_semundjet` int(11) NOT NULL,
  `gjymtyra` int(11) NOT NULL,
  `pershkrimi` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semundja`
--

INSERT INTO `semundja` (`id_semundjet`, `gjymtyra`, `pershkrimi`) VALUES
(1, 1, 'Keto dhimbje koke shkaktohen nga enet e gjakut te trurit kur ato punojne jo normalisht. Enet e gjakut te zgjeruara ne koke jane nxitesi i pare per dhimbjen e migrenes. Keto dhimbje prekin cdo moshe, por me shume ato midis moshes 20 dhe 50 vjeq. Ekziston dhe nje predispozite gjenetike. '),
(2, 1, 'Vertigo, apo thene ne menyre popullore marramendja, eshte humbja momentale e orientimit dhe shpeshhere shfaqet si pasoje e nje crregullimi ne organizem. Atehere kur pacienti ndjen se po sillet rreth vetes, mjeket dyshojne ne vertigo subjektiv, e nese objektet sillen rreth nesh, behet fjale per vertigo objektiv.\r\n'),
(3, 4, 'Shkurtpamesia (miopia) eshte e mete e shpeshte, shkaktohet ne rastet kur boshti i syrit (kerdhokulla e syrit) eshte me i gjate sesa te syri normal. Ne kete rast shohim qartazi vetem objektet qe jane afer, kurse ato qe i kane larg nuk i shohin qarte meqe rrezet e drites priten perpara retines (e jo ne te). Njerezit e tille duhet te bartin syza me thjerreza shperndarese-konkave.'),
(4, 4, 'Trakomen e shkakton virusi qe e sulmon mukozen e kapakeve te syrit. Trakoma bartet shume lehte prej nje personi tek tjetri. Kjo semundje perhapet shume shpejt ne kushte jetesore johigjienike, duke perdorur shume persona nje rize apo objekte tjera. Nese semundja nuk sherohet me kohe paraqiten deformime te renda te kapakeve te syrit, ashtu qe me vone mund te shkaktohet edhe verbesia'),
(5, 4, 'Largpamesia (Hipermetropia) eshte e kundert me shkurtpamesine. Shfaqet ne rastet kur boshti i syrit eshte i shkurter, prandaj rrezet e drites priten pertej retines, kurse ne lidhje me kete edhe fytyra e objektit formohet pertej retines. Njerezit e tille nuk i shohin qarte objektet e aferta por, perkundrazi ato te largeta. Njerezit me kete te mete duhet te bartin syza me thjerreza permbledhese-konvekse.'),
(7, 4, 'Astigmatizimi shfaqet kur kemi gungezim te kornese, gungezim te pabarabarte te thjerrezes se syrit. Ne keto raste objektet duken te paqarta. Kjo e mete menjanohet me bartjen e syzeve me thjerreza speciale.'),
(8, 1, 'Kjo eshte dhimbja me e zakonshme dhe sjell pakenaqesi ne koke, lekure apo qafe, dhe shpesh lidhet me ngushtesine e muskujve. Studimet tregojne se ato zhvillohen gjate pasdites, dhe shume rralle zgjasin me shume se kater ore. Keto lloj dhimbje koke, qe vijne nga tensioni, sipas te dhenave, e kane rreth 80 per qind e popullsise. Me shume vuajne grate se sa burrat, dhe rreth 3 per qind e te rriturve kane dhimbje koke kronike nga tensioni, me kriza me shume se 15 dite ne muaj.'),
(9, 6, 'Muskuli i zemres ushqehet me gjak nepermjet arterieve. Kur bllokohet njera nga keta arterie miokardi vuan per pranine e oksigjenit. '),
(10, 6, 'Kjo njihet ndryshe si ritmi i crregullt i rrahjeve te zemres. Ato shkaktohen nga ndryshimi i punes se ritmit te zemres, ose nga crregullimet e tejcimit te nxitjes se zemres. Rrahjet e zemres ne nje ritem me te larte se 100 per minute njihen si takikardi. Ne kete rast pjeset perberese te ketij organi nuk punojne njesoj ndaj dhe puna e zemres corientohet. Crregullimet e ritmit mund te gjenden ne mase tek njerezit e shendoshe, te cilet perdorin nje sere medikamentesh qe mund te lene efekte anesore. Simptomat dalluese ne kete rast jane veshtiresi ne frymemarrje, presion pulsor i rritur. Mund edhe te mos kete simptoma.'),
(11, 5, 'Ne semundjet e veshit marrin pjese edhe shume faktore te tjere, qe bejne pjese ne kete semundje te ketij organi, si dylli ne vesh, farunkula ne kanalin e jashtem te veshit, carja e daulles se veshit, atiti i jashtem dhe ai i huaj, semundja e minierit dhe shurdhimi.');

-- --------------------------------------------------------

--
-- Table structure for table `semundjet`
--

CREATE TABLE IF NOT EXISTS `semundjet` (
  `id_semundja` int(11) NOT NULL AUTO_INCREMENT,
  `id_gjymtyra` int(11) NOT NULL,
  `semundja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vlera` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_semundja`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `semundjet`
--

INSERT INTO `semundjet` (`id_semundja`, `id_gjymtyra`, `semundja`, `vlera`) VALUES
(1, 1, 'migrenet', 10),
(2, 1, 'marramendje', 9),
(3, 4, 'shkurtepamesia', 3),
(4, 4, 'trakoma', 2),
(5, 4, 'largpamesia', 0),
(7, 4, 'astigmatizmi', 1),
(8, 1, 'tensioni', 7),
(9, 6, 'Infarkti miokardit i zemres', 0),
(10, 6, 'aritmia', 0),
(11, 5, 'dhembje veshi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `simptomat`
--

CREATE TABLE IF NOT EXISTS `simptomat` (
  `id_simp` int(11) NOT NULL AUTO_INCREMENT,
  `id_pacienti` int(11) NOT NULL,
  `simptoma` text COLLATE utf8_unicode_ci,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_simp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `simptomat`
--

INSERT INTO `simptomat` (`id_simp`, `id_pacienti`, `simptoma`, `data`) VALUES
(3, 32, 'po me thwmb koka qe nga mengjesi!', '2011-11-02 19:39:30'),
(4, 32, 'kam marramendje!', '2011-11-02 19:40:27'),
(5, 33, 'kam teshtitje te shpesht.', '2011-11-02 19:43:35'),
(6, 32, 'mertiton', '2012-01-21 15:13:23'),
(7, 34, 'po me thembe koka dhe po me\r\ndridhen durte', '2012-02-13 11:34:25'),
(8, 32, 'jam smut po me thembe veshi', '2012-02-23 20:56:55'),
(9, 32, 'test nga forma', '2012-03-11 18:06:54'),
(10, 37, 'o lil po me dhemb veshi bre!', '2012-03-17 20:32:01'),
(11, 38, 'pershendetje jam semrur nga veshi', '2012-03-25 19:46:25'),
(12, 32, 'kam oke', '2012-03-30 16:45:12'),
(13, 37, 'kam thembje veshi!\r\n', '2012-04-01 18:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `sugjerimet`
--

CREATE TABLE IF NOT EXISTS `sugjerimet` (
  `id_sugjerimi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pacienti` int(11) NOT NULL,
  `sugjerimi` text COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_simp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sugjerimi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `sugjerimet`
--

INSERT INTO `sugjerimet` (`id_sugjerimi`, `id_pacienti`, `sugjerimi`, `data`, `id_simp`) VALUES
(21, 33, 'keni simptoma te gripit,\r\nperdor qaj, dhe shetitje ne ajer te paster.', '2011-11-02 19:53:37', 5),
(22, 32, 'si duket keni proglem me tensionin e gjakut.', '2011-11-02 19:54:57', 4),
(23, 32, 'perdore nje aspirin!', '2011-11-02 19:55:34', 3),
(24, 32, 'perdore nje aspirin!', '2011-11-02 19:56:06', 3),
(26, 32, 'mire je', '2011-12-12 16:36:10', 4),
(28, 34, 'te ka ra gripi\r\nperdore nje aspirin dhe hajde ne kontroll ne daten e caktuar', '2012-02-13 11:37:28', 7),
(29, 32, 'sa per tesr', '2012-03-12 20:09:27', 9),
(31, 37, 'pije nje qaj edhe mos u lazdro!', '2012-03-17 20:33:22', 10),
(32, 37, 'test', '2012-03-23 07:16:27', 10),
(33, 37, 'erere', '2012-03-25 17:07:36', 10),
(34, 37, 'perdore nje aspirin!', '2012-04-01 18:38:21', 13);

-- --------------------------------------------------------

--
-- Table structure for table `terminet`
--

CREATE TABLE IF NOT EXISTS `terminet` (
  `id_termini` int(11) NOT NULL AUTO_INCREMENT,
  `id_pacienti` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`id_termini`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `terminet`
--

INSERT INTO `terminet` (`id_termini`, `id_pacienti`, `data`) VALUES
(12, 32, 1369772880),
(13, 32, 1322852040),
(14, 34, 1330684620),
(15, 37, 1335199200);
