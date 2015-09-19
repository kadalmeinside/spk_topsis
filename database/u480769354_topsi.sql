-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: u480769354_topsi
-- ------------------------------------------------------
-- Server version	5.1.73

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilai` (
  `fisika` int(5) NOT NULL,
  `matematika` int(5) NOT NULL,
  `b_inggris` int(5) NOT NULL,
  `geografi` int(5) NOT NULL,
  `ekonomi` int(5) NOT NULL,
  `b_indonesia` int(5) NOT NULL,
  `nis` int(11) NOT NULL,
  `total` float NOT NULL,
  KEY `nis` (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` VALUES (50,50,40,40,80,90,20140009,0.252918),(65,65,80,75,80,80,20140010,0.615072),(70,80,90,80,70,80,20140011,0.773286),(80,80,80,70,65,50,20140012,0.655242),(70,50,60,80,90,50,20150005,0.44823),(65,80,75,80,80,60,20150006,0.661319),(80,80,75,80,80,90,20150007,0.797203),(75,70,80,65,80,80,20150008,0.665562),(80,60,70,80,80,80,20150009,0.607217),(80,90,80,70,80,90,20150010,0.846093);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM AUTO_INCREMENT=820150012 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (20140009,'Dudung Maman','Jl. Belakang Masjid'),(20140010,'Rizky Oktavian','Jl. Depsos Raya No. 43A'),(20140011,'Roby Anugrah','Jl. Simatupang Raya'),(20140012,'Jajang ','Banten'),(20150005,'Sumanto','Jl Kalimalang'),(20150006,'Supriyadi','Jl. Mantep Banget'),(20150007,'Suci Mira','Jl. Ciputat'),(20150008,'Dewan Prabu Yunani','Jl. Depsos Raya'),(20150009,'Gilang PP','Jl. Depsos'),(20150010,'M Saepul','Jl Pondok Ranji');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` int(9) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'Gilang','Pandu','gilangpanduparase@gmail.com','c531bd1acb5ee913723eaac3c4eb7a3b');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-10  7:49:13
